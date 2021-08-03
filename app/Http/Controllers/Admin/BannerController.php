<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show_paginate = isset(request()->show) ? request()->show : 10;
        $data_banner = Banner::orderBy('created_at')->Search()->paginate($show_paginate);
        return view('dashboard.banner.index',compact('data_banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.banner.create');
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
                'name'=>'required|unique:banner|max:30',
                'image'=>'required',
                'subtitle'=>'required',
                'title_first'=>'required',
                'title_second'=>'required'
            ],
            [
                'name.required'=>'Field name blank.',
                'name.unique'=>'This name has exited in table banner .',
                'name.max'=>'Limit 30 character .',
                'image.required'=>'Field image blank.',
                'subtitle.required'=>'Field subtitle blank.',
                'title_first.required'=>'Field tile first blank.',
                'title_second.required'=>'Field title second blank.',
            ]
        );
        if(
            Banner::create([
                'name'=>request()->name,
                'image'=>request()->image,
                'subtitle'=>request()->subtitle,
                'title_first'=>request()->title_first,
                'title_second'=>request()->title_second
            ])
            ){
            return redirect()->route('banner.create')->with('success','Add new banner successfully');
        }else{
            return redirect()->back()->with('error','Add new banner fall .');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(banner $banner)
    {
        return view('dashboard.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, banner $banner)
    {
        $request->validate(
            [
                'name'=>'required|unique:banner|max:30',
                'image'=>'required',
                'subtitle'=>'required',
                'title_first'=>'required',
                'title_second'=>'required'
            ],
            [
                'name.required'=>'Field name blank.',
                'name.unique'=>'This name has exited in table banner .',
                'name.max'=>'Limit 30 character .',
                'image.required'=>'Field image blank.',
                'subtitle.required'=>'Field subtitle blank.',
                'title_first.required'=>'Field tile first blank.',
                'title_second.required'=>'Field title second blank.',
            ]
        );
        if($banner->update([
            'name'=>request()->name,
            'image'=>request()->image,
            'subtitle'=>request()->subtitle,
            'title_first'=>request()->title_first,
            'title_second'=>request()->title_second
        ])){
            return redirect()->route('banner.edit',compact('banner'))->with('success', 'update item banner successfully.');
        }else{
            return redirect()->back()->with('error', 'update item banner fall.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(banner $banner)
    {
        if($banner->delete()){
            return redirect()->route('banner.index')->with('success','Your item has been deleted.');
        }else{
            return redirect()->back()->with('error','Your item has been deleted.');

        }
    }
}
