<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show_paginate = isset(request()->show) ? request()->show : 10;
        $data_role = Role::orderBy('created_at')->Search()->paginate($show_paginate);
        return view('dashboard.role.index',compact('data_role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allRoute = Route::getRoutes();
        $routes = array();
        $route_children = array();
        foreach ($allRoute as $rou) {
            $name = $rou->getName();
            if(strpos($name,'customer') !== false || strpos($name,'client') !== false || strpos($name,'cart') !== false){

            }else{
                if(
                    strpos($name,'admin') !== false || strpos($name,'category') !== false || strpos($name,'product') !== false || 
                    strpos($name,'variantProduct') !== false || strpos($name,'banner') !== false || strpos($name,'order') !== false || 
                    strpos($name,'cusMan') !== false || strpos($name,'review') !== false || strpos($name,'settingLink') !== false || 
                    strpos($name,'role') !== false || strpos($name,'decentralize') !== false || strpos($name,'blog') !== false
                ){
                    if(!in_array(substr($rou->getName(), 0, strpos($rou->getName(), '.')), $routes)){
                        array_push($routes, substr($rou->getName(), 0, strpos($rou->getName(), '.')));
                    }
                }
            }
            
        }
        return view('dashboard.role.create',compact('routes'));
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
            'name'=>'required|string|max:30|unique:role'
        ]);
        if(Role::create([
            'name'=>request()->name,
            'permission'=>json_encode($request->routes)
        ])){
            return redirect()->back()->with('success', 'Add role successfully.');
        }else{
            return redirect()->back()->with('error', 'Add role failed.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(role $role)
    {
        $allRoute = Route::getRoutes();
        $routes = array();
        $route_children = array();
        foreach ($allRoute as $rou) {
            $name = $rou->getName();
            if(strpos($name,'customer') !== false || strpos($name,'client') !== false || strpos($name,'cart') !== false){

            }else{
                if(
                    strpos($name,'admin') !== false || strpos($name,'category') !== false || strpos($name,'product') !== false || 
                    strpos($name,'variantProduct') !== false || strpos($name,'banner') !== false || strpos($name,'order') !== false || 
                    strpos($name,'cusMan') !== false || strpos($name,'review') !== false || strpos($name,'settingLink') !== false || 
                    strpos($name,'role') !== false || strpos($name,'decentralize') !== false || strpos($name,'blog') !== false
                ){
                    if(!in_array(substr($rou->getName(), 0, strpos($rou->getName(), '.')), $routes)){
                        array_push($routes, substr($rou->getName(), 0, strpos($rou->getName(), '.')));
                    }
                }
            }
            
        }
        return view('dashboard.role.edit',compact('role','routes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, role $role)
    {
        $request->validate([
            'name'=>'required|string|max:30|unique:role'
        ]);
        if($role->update([
            'name'=>request()->name,
            'permission'=>json_encode($request->routes)
        ])){
            return redirect()->back()->with('success', 'update role successfully.');
        }else{
            return redirect()->back()->with('error', 'update role failed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(role $role)
    {
        if($role->getAdmins()->count() > 0){
            return redirect()->back()->with('error','This role already exist in Admin table.');
        }else{
            if($role->delete()){
                return redirect()->back()->with('success','Delete role successfully.');
            }else{
                return redirect()->back()->with('error','Delete role fail.');
            }
        }
    }
}
