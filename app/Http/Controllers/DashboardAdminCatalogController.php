<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;

class DashboardAdminCatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.dashboardcatalog',[
            "catalogs" => Laptop::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.dashboardcatalogcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'laptop_name' => 'required',
            'laptop_brand' => 'required',
            'laptop_type' => 'required',
            'laptop_desc' => 'required',
            'laptop_condition' => 'required',
            'laptop_weight' => 'required|numeric',
            'laptop_price' => 'required|numeric',
            'laptop_stock' => 'required|numeric',
        ]);

        Laptop::create($validatedData);

        return redirect('/admin-dashboard/laptops')->with('success', 'Laptop has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function show(Laptop $laptop)
    {
        // return $laptop;
        return view('dashboard.admin.dashboardcatalogshow',[
            "laptop" => $laptop
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function edit(Laptop $laptop)
    {
        return view('dashboard.admin.dashboardcatalogedit',[
            "laptop" => $laptop
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laptop $laptop)
    {
        $validatedData = $request->validate([
            'laptop_name' => 'required',
            'laptop_brand' => 'required',
            'laptop_type' => 'required',
            'laptop_desc' => 'required',
            'laptop_condition' => 'required',
            'laptop_weight' => 'required|numeric',
            'laptop_price' => 'required|numeric',
            'laptop_stock' => 'required|numeric',
        ]);

        Laptop::where('id', $laptop->id)
            ->update($validatedData);

        return redirect('/admin-dashboard/laptops')->with('success', 'Laptop has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laptop $laptop)
    {
        
        Laptop::destroy($laptop->id);

        return redirect('/admin-dashboard/laptops')->with('success', 'Laptop has been deleted');
    }
}
