<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_detail = OrderDetail::all();
        $totalOrder = Order::all();
        $category = Category::all();
        $totalCustomer = Customer::all()->count();
        $totalProduct = Product::all()->count();
        $totalReview = Review::all()->count();
        return view('dashboard.home',compact('order_detail','totalOrder','category','totalCustomer','totalProduct','totalReview'));
    }

    public function filter_chart_by_date(Request $request)
    {
        $data = request()->all();
        $formDate = request()->fromDate;
        $toDate = request()->toDate;
        $get = OrderDetail::WhereBetween('created_at',[$formDate,$toDate])->orderBy('created_at','ASC')->get();
        foreach ($get as $key => $value) {
            $chartData[] = array(
                'name'=>$value->name,
                'quantity'=>$value->quantity,
                'price'=>$value->price,
                'created_at'=> $value->created_at->format('Y-m-d'),
                'sales'=>$value->quantity*$value->price,
                'profit'=> ($value->quantity*$value->price)*0.3
            ); 
        }
        echo $data = json_encode($chartData);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
