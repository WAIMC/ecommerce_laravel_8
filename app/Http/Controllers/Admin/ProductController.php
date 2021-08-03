<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show_paginate = isset(request()->show) ? request()->show : 10;
        $data_product = Product::orderBy('created_at')->Search()->paginate($show_paginate);
        return view('dashboard.product.index',compact('data_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('created_at','DESC')->select('id','name')->get();
        return view('dashboard.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::orderBy('created_at','DESC')->select('id','name')->get();

        
        // 'price'=>'required|integer|not_in:0|regex:/^[1-9][0-9]+/',
        // 'discount'=>'required|integer|not_in:0|regex:/^[1-9][0-9]+/',
        // 'gallery'=>'required'
        request()->validate(
            [
                'name'=>'required|unique:product|max:30',
                'description'=>'required',
                'image'=>'required|max:10000'
            ],
            [
                'name.required'=>'Do not leave blank',
                'name.unique'=>'Product name already exist',
                'name.max'=>'input limit 30 characters',
                'description.required'=>'Do not leave blank',
                'image.required'=>'Do not leave blank'
            ]
        );
        if(product::create([
            'name'=>request()->name,
        	'description'=>request()->description,
        	'image'	=>request()->image,
        	'status'=>request()->status,
            'id_category'=>request()->id_category
        ])){
            return redirect()->route('product.create',compact('category'))->with('success','Add product successfully.');
        }else{
            return redirect()->route('product.create',compact('category'))->with('error','Add product fall.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $category = Category::orderBy('created_at','DESC')->select('id','name')->get();
        return view('dashboard.product.edit',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $category = Category::orderBy('created_at','DESC')->select('id','name')->get();
        request()->validate(
            [
                'name'=>'required|unique:product|max:30',
                'description'=>'required',
                'image'=>'required|max:10000'
            ],
            [
                'name.required'=>'Do not leave blank',
                'name.unique'=>'Product name already exist',
                'name.max'=>'input limit 30 characters',
                'description.required'=>'Do not leave blank',
                'image.required'=>'Do not leave blank'
            ]
        );
        if($product->update([
            'name'=>request()->name,
        	'description'=>request()->description,
        	'image'	=>request()->image,
        	'status'=>request()->status,
            'id_category'=>request()->id_category
        ])){
            return redirect()->route('product.edit',compact('product','category'))->with('success','Update product successfully .');
        }else{
            return redirect()->route('product.edit',compact('product','category'))->with('error','Update product fall .');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        if($product->product_variantProduct()->count()>0){
            return redirect()->back()->with('error','Delete product fall, product in variant product table already exist .');
        }else{
            if($product->delete()){
                return redirect()->route('product.index')->with('success','Delete product successfully .');
            }else{
                return redirect()->back()->with('error','Delete product fall.');
            }
        }
        
        
    }
}
