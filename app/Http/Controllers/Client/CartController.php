<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        // get all product (add name of model quick view or add to card )
        $product = Product::all();
        return view('client.cart',compact('product'));
    }

    public function store(Request $request)
    {
        Cart::add(
            [
                'id'=>request()->id_variant_product,
                'name'=>request()->name,
                'price'=>request()->price,
                'qty'=>request()->quantity,
                'options'=>[
                    'size'=>'large',
                    'color'=>request()->color,
                    'image'=>request()->image
                ]
            ]
        );
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        Cart::remove(request()->id_cart);
        return redirect()->back();
    }

    public function update(Request $request)
    {
        if(Cart::count()>0){
            
            Cart::update(request()->rowId, ['qty' => request()->quantity]);
        }
        
        return redirect()->back();
    }
}
