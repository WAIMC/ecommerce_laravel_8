<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\settingLink;
use Illuminate\Http\Request;

class SettingLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show_paginate = isset(request()->show) ? request()->show : 10;
        $data_st = settingLink::orderBy('created_at')->Search()->paginate($show_paginate);
        return view('dashboard.setting.index',compact('data_st'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.setting.create');
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
            'config_key'=>'required|string|max:30',
            'config_value'=>'required|string|max:30',
        ]);
        if(settingLink::create([
            'config_key'=>request()->config_key,
            'config_value'=>request()->config_value,
        ])){
            return redirect()->back()->with('success','Add link successfully.');
        }else{
            return redirect()->back()->with('error','Add link fail.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\settingLink  $settingLink
     * @return \Illuminate\Http\Response
     */
    public function show(settingLink $settingLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\settingLink  $settingLink
     * @return \Illuminate\Http\Response
     */
    public function edit(settingLink $settingLink)
    {
        return view('dashboard.setting.edit',compact('settingLink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\settingLink  $settingLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, settingLink $settingLink)
    {
        $request->validate([
            'config_key'=>'required|string|max:30',
            'config_value'=>'required|string|max:30',
        ]);
        if($settingLink->update($request->only('config_key','config_value'))){
            return redirect()->back()->with('success','Updated successfully.');
        }else{
            return redirect()->back()->with('error','Updated fail.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\settingLink  $settingLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(settingLink $settingLink)
    {
        if($settingLink->delete()){
            return redirect()->back()->with('success','Deleted successfully.');
        }else{
            return redirect()->back()->with('error','Deleted fail.');
        }
    }
}
