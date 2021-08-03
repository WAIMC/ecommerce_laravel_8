<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    public function index()
    {
        // using for banner header of page
        $slider = Banner::all();

        // get all product (add name of model quick view or add to card )
        $product = Product::all();

        // using for section THE NEW ARRIVALS and BEST SELLERS
        $new_product = Product::latest()->take(12)->get();


         // get variant product , show all variant product with status == 0 (get represent 1 product)
        //  foreach ($product as $value) {
        //     $test = $value->product_variantProduct()->where('status',0)->get();
        //     // echo " => ".$test.' het :';
            
        //     // get value of object variant product, must foreach to get value because this is a object
        //     foreach ($test as $ax) {
        //         echo " value : ".$ax->id. "  ---- ";
        //         $json_test = json_decode($ax->gallery);
        //         foreach ($json_test as $hihi ) {
        //             echo "<br> this is json ". $hihi. "<br>";
        //         }
        //     }
        // }

        return view('client.home',compact('slider','new_product','product'));
    }

    public function shop(Request $request)
    {
        // get all product (add name of model quick view or add to card ), don not delete $product using for master view
         $product = Product::all();

        // show paginate , and search
        $show_paginate = isset(request()->show) ? request()->show : 9;
        $softBy = isset(request()->softBy) ? request()->softBy : 'DESC';
        $data_product = Product::orderBy('created_at',$softBy)->SearchCategory()->Search()->paginate($show_paginate);

        // show category
        $category = category::where('parent_id',0)->get();
        
        return view('client.shop',compact('category','product','data_product'));
    }

    public function wishlist()
    {
        // get all product (add name of model quick view or add to card )
        $product = Product::all();
        return view('client.wishlist',compact('product'));
    }

    public function checkout()
    {
        // get all product (add name of model quick view or add to card )
        $product = Product::all();

        return view('client.checkout',compact('product'));
    }

    public function blog()
    {
        // get all product (add name of model quick view or add to card )
        $product = Product::all();
        return view('client.blog',compact('product'));
    }
    
    public function about()
    {
        
        // get all product (add name of model quick view or add to card )
        $product = Product::all();
        return view('client.about',compact('product'));
    }

    public function contact()
    {
        // get all product (add name of model quick view or add to card )
        $product = Product::all();
        return view('client.contact',compact('product'));
    }

    public function postContact(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:30',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
       ]);
       Mail::send('emails.contact',[
        'name'=>request()->name,
        'content'=>request()->message,
       ], function($mail) use($request) {
        $mail->to('dovanvinhwao@gmail.com', $request->name);
        $mail->from($request->email);
        $mail->subject('test mail');
       });
       return redirect()->back()->with('contact','Thank you has feed back .');
    }

    public function product_detail(Request $request)
    {
        // get all product (add name of model quick view or add to card )
        $product = Product::all();

        $valid_product = true;
        // check is product empty or product count limit passed
        if(request()->id_product != null){
            foreach ($product as $key => $value) {
                if(request()->id_product == $value->id){
                    $valid_product = true;
                    break;
                }else{
                    $valid_product = false;
                }
            }
        }else{
            $valid_product = false;
        }

        // get product detail with id 
        if($valid_product){
            $product_dt = Product::find(request()->id_product);
            $avg_star = Review::avg('rating_star');
        }else{
            $product_dt = '';
        }

        return view('client.product_detail',compact('product','valid_product','product_dt','avg_star'));
    }

}
