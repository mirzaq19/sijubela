<?php

namespace App\Http\Controllers;

use App\Models\SellLaptop;
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
            "offers" => SellLaptop::where('sell_laptop_status', '=', '0')->get()
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
        $validatedData = $request->validate([
            'status' => 'required|in:0,1,2',
        ]);

        $validatedData['status'] = 2;

        SellLaptop::where('id',$sellLaptop->id)->update($validatedData);

        return redirect('/admin-dashboard/offer')->with('success','Offer status updated successfully');
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
