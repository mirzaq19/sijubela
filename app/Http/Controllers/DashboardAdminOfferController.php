<?php

namespace App\Http\Controllers;

use App\Models\SellLaptop;
use App\Models\Laptop;
use Illuminate\Http\Request;

class DashboardAdminOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.dashboardoffer',[
            "offers" => SellLaptop::where('sell_laptop_status', '=', '0')->get(),
            "offers_accepted" => SellLaptop::where('sell_laptop_status', '=', '1')->get(),
            "offers_rejected" => SellLaptop::where('sell_laptop_status', '=', '2')->get(),
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
        return view('dashboard.admin.dashboardoffershow',[
            "sell_laptop" => $sellLaptop
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellLaptop  $sellLaptop
     * @return \Illuminate\Http\Response
     */
    public function edit(SellLaptop $sellLaptop)
    {
        return view('dashboard.admin.dashboardofferedit',[
            "sell_laptop" => $sellLaptop
        ]);
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
        $sellLaptop->sell_laptop_status = $request->sell_laptop_status;
        $sellLaptop->save();

        return redirect('/admin-dashboard/sell_laptops')->with('success','Offer status updated successfully');
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
