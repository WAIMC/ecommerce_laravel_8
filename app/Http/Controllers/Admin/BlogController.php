<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show_paginate = isset(request()->show) ? request()->show : 10;
        $data_blog = Blog::orderBy('created_at')->Search()->paginate($show_paginate);
        return view('dashboard.blog.index',compact('data_blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'short_description'=>'string|required',
            'description'=>'string|required',
            'title'=>'string|required|max:50',
            'image'=>'string|required',
            'author'=>'string|required|max:50',
        ]);
        if(
            Blog::create([
                'short_description' => request()->short_description,
                'description' => request()->description,
                'title' => request()->title,
                'image' => request()->image,
                'author' => request()->author,
            ])
        ){
            return redirect()->back()->with('success','Add blog successfully .');
        }else{
            return redirect()->back()->with('error','Add blog failed .');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog)
    {
        return view('dashboard.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog $blog)
    {
        $request->validate([
            'short_description'=>'string|required',
            'description'=>'string|required',
            'title'=>'string|required|max:50',
            'image'=>'string|required',
            'author'=>'string|required|max:50',
        ]);
        if(
            $blog->update([
                'short_description' => request()->short_description,
                'description' => request()->description,
                'title' => request()->title,
                'image' => request()->image,
                'author' => request()->author,
            ])
        ){
            return redirect()->back()->with('success','Update blog successfully .');
        }else{
            return redirect()->back()->with('error','Update blog failed .');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog)
    {
        //
    }
}
