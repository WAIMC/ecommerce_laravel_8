<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Review;
use App\Models\VariantProduct;
use Illuminate\Support\Facades\Hash;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;


class CustomerController extends Controller
{
    public function index(Request $request)
    {
        // get all product (add name of model quick view or add to card )
        $product = Product::all();

        $data_order =array();
        $data_detail=array();
        if($request->session()->has('customer')){
            $get_data = $request->session()->get('customer', 'default');
            $data_order = Order::where('email',$get_data['email'])->get();
            foreach ($data_order as $key => $value) {
                $data_detail[] = OrderDetail::where('id_order',$value->id)->get();
            }
        }


        return view('client.account',compact('product','data_order','data_detail'));
    }
    
    public function postLogin(Request $request)
    {
        $request->validate(
            [
                'email'=>'required|string|max:255|email',
                'password' => 'required|string|min:8',
            ],
            [
                'email.required'=>'Do not input email blank',
                'email.email'=>'Input is not email',
                'password.min'=>'Password min 8 character'
            ],
        );

        // convert object data to array for session customer
        $arr_cus = array();
        foreach (json_decode(Customer::where('email', request()->email)->get()) as $key => $value) {
           foreach ($value as $pa => $res) {
               $arr_cus[$pa] = $res;
           }
        }

        // get password in customer table
        $get_password = Customer::select('password')->where('email', request()->email)->get();
        
        // check login
        if(Customer::where('email', request()->email)->get()->count()>0){
            foreach ($get_password as $getpw) {
                if(Hash::check(request()->password, $getpw->password )){
                    $request->session()->put('customer', $arr_cus);
                    return redirect()->back()->with('success_login', 'login successfully .');
                }else{
                    return redirect()->back()->with('error_login', 'Password wrong .');
                }
            }
        }else{
            return redirect()->back()->with('error_login', 'Email is not exist .');
        }

    }

    public function getLogout(Request $request)
    {
        $request->session()->forget('customer');
        return redirect()->back();
    }

    public function postRegister(Request $request)
    {
        $request->validate(
            [
                'name'=>'required|string|max:255',
                'email'=>'required|string|max:255|email|unique:customer',
                'password' => 'required|string|min:8|confirmed',
            ],
            [
                'name.required'=>'Do not input full name blank',
                'name.string'=>'Full name is string',
                'name.max'=>'Full name max 255 character',
                'email.required'=>'Do not input email blank',
                'email.email'=>'Input is not email',
                'email.unique'=>'This email has exist',
                'password.min'=>'Password min 8 character',
                'password.confirmed'=>'Confirm password wrong',
            ],
        );

        if(Customer::create([
                'name'=>request()->name,
                'email'=>request()->email,
                'password'=>Hash::make(request()->password),
                'phone'=>request()->phone,
                'address'=>request()->address	
            ])
        ){
            return redirect()->back()->with('success_register','Register successfully .');
        }else{
            return redirect()->back()->with('error_register','Register fall .');
        }

    }

    // proceed to payment 
    
    public function payment(Request $request)
    {
        $add_order_detail = Cart::content();

        // check empty card
        if(Cart::count()>0){

            $request->validate(
                [
                    'name'=>'required|string|max:255',
                    'address'=>'required|string|max:255',
                    'phone'=>'required|string|max:255',
                    'email'=>'required|string|max:255|email',
                ],
                [
                    'name.required'=>'Do not input full name blank',
                    'name.string'=>'Full name is string',
                    'name.max'=>'Full name max 255 character',
                    'email.required'=>'Do not input email blank',
                    'email.email'=>'Input is not email'
                ],
            );

            // create new order when submit request
            $order = Order::create([
                        'name'=>request()->name,
                        'email'=>request()->email,
                        'phone'=>request()->phone,
                        'address'=>request()->address,
                        'note'=>request()->note,
                        'id_customer'=>request()->id_customer
                    ]);

            // create new order detail from order
            foreach ($add_order_detail as $o_d) {
                OrderDetail::create([
                    'id_order'=>$order->id,
                	'id_variant_product'=>$o_d->id,
                	'name'=>$o_d->name,
                	'quantity'=>$o_d->qty,
                	'price'=>$o_d->price	
                ]);
                // update quantity variant product
                $ud_vp = VariantProduct::find($o_d->id);
                $quantity = $ud_vp->quantity - $o_d->qty;
                $ud_vp->update([
                    'quantity'=> $quantity
                ]);
            }
            
            // send mail customer has been ordered
            if($order){
                Mail::send('emails.order',[
                    'name_customer'=>request()->name,
                    'order_code'=>$order->id,
                    'time_order'=>$order->created_at,
                    'order_detail'=>$add_order_detail,
                   ], function($mail) use($request) {
                    $mail->to($request->email, $request->name);
                    $mail->from('dovanvinhwao@gmail.com','Shop MC Wai');
                    $mail->subject('Order success.');
                   });

                Cart::destroy();
                return redirect()->back()->with('success_payment','Proceed to payment successfully .');
            }else{
                return redirect()->back()->with('error_payment','Add order fall .');
            }
        }else{
            return redirect()->back()->with('error_payment','Please add some product to card let proceed to payment .');
        }
        
    }

    public function review(Request $request)
    {
        $mess_review = '';
        if(request()->rating_star != null && request()->id_customer != null && request()->id_product != null && request()->comment != null){
            $review = Review::create([
                'id_customer' => request()->id_customer,
                'id_product' => request()->id_product,
                'comment' => request()->comment,
                'rating_star' => request()->rating_star
            ]);
            if($review){
                $mess_review =  "Thanks about your review .";
            }else{
                $mess_review = "Your review has been sended fall . ";
            }
        }else{
            $mess_review = "Has something error, maybe all not already loaded or missed some param .";
        }
        echo $mess_review;
    }

}
