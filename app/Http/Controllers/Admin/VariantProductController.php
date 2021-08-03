<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\VariantProduct;
use Illuminate\Http\Request;

class VariantProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show_paginate = isset(request()->show) ? request()->show : 10;
        $data_vp = VariantProduct::orderBy('created_at')->Search()->paginate($show_paginate);
        return view('dashboard.variantProduct.index',compact('data_vp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::orderBy('created_at','DESC')->select('id','name')->get();
        return view('dashboard.variantProduct.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::orderBy('created_at','DESC')->select('id','name')->get();
        request()->validate(
            [
                'color'=>'required|string',
                'quantity'=>'required|integer|not_in:0|regex:/^[1-9][0-9]+/',
                'price'=>'required|integer|not_in:0|regex:/^[1-9][0-9]+/',
                'discount'=>'required|integer|not_in:0|regex:/^[1-9][0-9]+/',
                'gallery'=>'required|max:10000'
            ],
            [
                'color.required'=>'Do not leave blank',
                'gallery.required'=>'Do not leave blank',
            ]
        );
        if(VariantProduct::create([
            'id_product'=>request()->id_product,
        	'color'=>request()->color,
        	'color_code'=>request()->color_code,
            'quantity'=>request()->quantity,
            'price'=>request()->price,
            'discount'=>request()->discount,
            'gallery'=>request()->gallery,
        	'status'=>request()->status
        ])){
            return redirect()->route('variantProduct.create',compact('product'))->with('success','Add variant product successfully.');
        }else{
            return redirect()->route('variantProduct.create',compact('product'))->with('error','Add variant product fall.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VariantProduct  $variantProduct
     * @return \Illuminate\Http\Response
     */
    public function show(VariantProduct $variantProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VariantProduct  $variantProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(VariantProduct $variantProduct)
    {
        $product = Product::orderBy('created_at','DESC')->select('id','name')->get();
        return view('dashboard.variantProduct.edit',compact('variantProduct','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VariantProduct  $variantProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VariantProduct $variantProduct)
    {
        $product = Product::orderBy('created_at','DESC')->select('id','name')->get();
        request()->validate(
            [
                'color'=>'required|string',
                'quantity'=>'required|integer|not_in:0|regex:/^[1-9][0-9]+/',
                'price'=>'required|integer|not_in:0|regex:/^[1-9][0-9]+/',
                'discount'=>'required|integer|not_in:0|regex:/^[1-9][0-9]+/',
                'gallery'=>'required|max:10000'
            ],
            [
                'color.required'=>'Do not leave blank',
                'gallery.required'=>'Do not leave blank',
            ]
        );
        if($variantProduct->update([
            'id_product'=>request()->id_product,
        	'color'=>request()->color,
        	'color_code'=>request()->color_code,
            'quantity'=>request()->quantity,
            'price'=>request()->price,
            'discount'=>request()->discount,
            'gallery'=>request()->gallery,
        	'status'=>request()->status
        ])){
            return redirect()->route('variantProduct.edit',compact('variantProduct','product'))->with('success','Update variant product successfully .');
        }else{
            return redirect()->route('variantProduct.edit',compact('variantProduct','product'))->with('error','Update variant product fall .');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VariantProduct  $variantProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(VariantProduct $variantProduct)
    {
        if($variantProduct->delete()){
            return redirect()->route('variantProduct.index')->with('success','Delete variant product successfully .');
        }else{
            return redirect()->back()->with('error','Delete variant product fall.');
        }
    }
}
