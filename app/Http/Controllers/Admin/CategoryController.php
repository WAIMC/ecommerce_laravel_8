<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show_paginate = isset(request()->show) ? request()->show : 10;
        $data_category = Category::orderBy('created_at')->Search()->paginate($show_paginate);
        return view('dashboard.category.index',compact('data_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $show_option = $this->categoryRecursive($id=0);
        return view('dashboard.category.create',compact('show_option'));
        // dd($show_option);
    }

    /* 
        loop parent id category recursive
    */
    public function categoryRecursive($id, $text = "")
    {
        $data_option = Category::all();
        $input_option = "";
        foreach ($data_option as $value) {
            // if($value['parent_id'] == $id){
            //     $input_option .= "<option value='".$value['id']."' >" . $text . " " . $value['name'] . "</option>";
            //     $this->categoryRecursive($value['id'], $text .= " -- ");
            // }
            $input_option .= "<option id='seleted_".$value['id']."' value='".$value['id']."' >" . $text . " " . $value['name'] . "</option>";
        }
        return $input_option;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>'required|unique:category|max:30'
            ],
            [
                'name.required'=>'Field name blank.',
                'name.unique'=>'This name has exited in table category .',
                'name.max'=>'Limit 30 character .'
            ]
        );
        if(
            Category::create([
                'name'=>request()->name,
                'parent_id'=>request()->parent_id,
                'slug'=>Str::slug(request()->name)
            ])
            ){
            return redirect()->route('category.create')->with('success','Add new category successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        $data_selected = Category::all();
        $show_option = $this->categoryRecursive($id=0);
        return view('dashboard.category.edit', compact('category','show_option','data_selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $request->validate(
            [
            'name'=>'required|unique:category|max:30'
            ],[
                'name.required'=>'Field name blank.',
                'name.unique'=>'This name has exited in table category .',
                'name.max'=>'Limit 30 character .'
            ]
        );
        $data_selected = Category::all();
        $show_option = $this->categoryRecursive($id=0);
        if($category->update(['name'=>request()->name,'parent_id'=>request()->parent_id,'status'=>request()->status])){
            return redirect()->route('category.edit',compact('category'))->with('success', 'update item category successfully.');
        }else{
            return redirect()->route('category.edit',compact('category','show_option','data_selected'))->with('error', 'update item category fall.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        if($category->category_product->count() > 0 ){
            $result = [
                'Cannot Delete!',
                'Your category has been exited product.',
                'info'
            ];
            // 'result',$result, 
            return redirect()->route('category.index')->with('error','Your category has been exited product.');
        }else{
            $result = [
                'Deleted!',
                'Your item has been deleted.',
                'success'
            ];
            if($category->delete()){
                return redirect()->route('category.index')->with('success','Your item has been deleted.');
            }else{
                return redirect()->back()->with('error','Your item has been deleted.');

            }
        }
    }
}
