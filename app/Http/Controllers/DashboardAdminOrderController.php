<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Laptop;
use App\Models\BuyerUser;

class DashboardAdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.dashboardorder',[
            "orders" => Order::all(),
            "buyers" => BuyerUser::all('id','buyer_username'),
            "laptops" => Laptop::all('id','laptop_name'),
            "orderdetails" => OrderDetail::all('order_id','laptop_id'),

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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('dashboard.admin.dashboardordershow',[
            "order" => $order,
            "buyer" => BuyerUser::find($order->buyer_user_id),
            "orderdetails" => OrderDetail::where('order_id',$order->id)->get(),
            "laptops" => Laptop::all('id','laptop_name'),
            "payment" => $order->payments()->orderByDesc('created_at')->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('dashboard.admin.dashboardorderedit',[
            "order" => $order,
            "buyer" => BuyerUser::find($order->buyer_user_id),
            "orderdetails" => OrderDetail::where('order_id',$order->id)->get(),
            "laptops" => Laptop::all('id','laptop_name'),
            "payment" => $order->payments()->orderByDesc('created_at')->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {   
        $payment = $order->payments()->orderByDesc('created_at')->first();
        $payment->payment_status = $request->payment_status;
        $payment->save();
        $order->order_status = $request->order_status;
        $order->save();
        $order->shipping_status = $request->shipping_status;
        $order->save();

        return redirect('/admin-dashboard/orders')->with('success','Shipping status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetail $orderDetail)
    {
        //
    }
}
