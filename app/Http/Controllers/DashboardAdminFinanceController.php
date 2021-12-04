<?php

namespace App\Http\Controllers;

use App\Models\SellLaptop;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Laptop;
use Illuminate\Http\Request;

class DashboardAdminFinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Laptop $laptops)
    {
        return view('dashboard.admin.dashboardfinance',[
            'sell_laptops' => SellLaptop::where('sell_laptop_status',1)->get(),
            'orders' => Order::where('order_status','!=','not_paid' || 'cancel')->get(),
            'orderdetails' => OrderDetail::all(),
            'laptops' => Laptop::all(),
        ]);
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
     * @param  \App\Models\SellLaptop  $sellLaptop
     * @return \Illuminate\Http\Response
     */
    public function show(SellLaptop $sellLaptop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellLaptop  $sellLaptop
     * @return \Illuminate\Http\Response
     */
    public function edit(SellLaptop $sellLaptop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellLaptop  $sellLaptop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellLaptop $sellLaptop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellLaptop  $sellLaptop
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellLaptop $sellLaptop)
    {
        //
    }
}
