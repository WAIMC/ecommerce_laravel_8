<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\Role;
use App\Models\AdminRole;
use Illuminate\Http\Request;

class DecentralizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show_paginate = isset(request()->show) ? request()->show : 10;
        $data_decentralize = Admin::orderBy('created_at')->Search()->paginate($show_paginate);
        return view('dashboard.decentralize.index',compact('data_decentralize'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    public function edit_form(Request $request)
    {
        
        dd(request()->all());
        // return view('dashboard.decentralize.edit',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,admin $admin)
    {
        $admin2 = Admin::find(request()->id);
        $getRoleChecked = $admin2->admin_role()->get();
        $getRole = Role::all();
        $role_assignment = $admin2->getRoles->pluck('name','id')->toArray();
        return view('dashboard.decentralize.edit',compact('admin2', 'getRoleChecked', 'getRole', 'role_assignment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        $getAdmin = Admin::find($request->id);
        $getAllAdminRole = AdminRole::all(); 
        if($getAdmin->admin_role()->count()>0){
            foreach ($getAllAdminRole as $del) {
                AdminRole::where('admin_id',$getAdmin->id)->delete();
                // $getAllAdminRole->each->delete();
            }
            foreach ($request->role as $updateRole) {
                AdminRole::create(['admin_id' => $getAdmin->id, 'role_id' => $updateRole]);
            }
            return redirect()->back()->with('success','Update role successfully .');
        }else{
            foreach ($request->role as $storeRole) {
                AdminRole::create([ 'admin_id' => $getAdmin->id, 'role_id' => $storeRole ]);
            };
            return redirect()->back()->with('success','Update role successfully .');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        
    }
}
