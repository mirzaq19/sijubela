<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\LaptopImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            'laptop_image' => 'required',
            'laptop_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        
        $laptop = Laptop::create([
            'laptop_name' => $validatedData['laptop_name'],
            'laptop_brand' => $validatedData['laptop_brand'],
            'laptop_type' => $validatedData['laptop_type'],
            'laptop_desc' => $validatedData['laptop_desc'],
            'laptop_condition' => $validatedData['laptop_condition'],
            'laptop_weight' => $validatedData['laptop_weight'],
            'laptop_price' => $validatedData['laptop_price'],
            'laptop_stock' => $validatedData['laptop_stock'],
        ]);

        if($request->hasFile('laptop_image')) {
            $files = $request->file('laptop_image');
            foreach($files as $file) {
                $name = time().rand(1,100).'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('img/product');
                $file->move($destinationPath, $name);
                $nameWithPath = 'img/product/'.$name;
                LaptopImage::create([
                    'laptop_id' => $laptop->id,
                    'laptop_image' => $nameWithPath,
                ]);
            }
        }

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
            'laptop_image' => 'sometimes|nullable',
            'laptop_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        
        $laptop->update([
            'laptop_name' => $validatedData['laptop_name'],
            'laptop_brand' => $validatedData['laptop_brand'],
            'laptop_type' => $validatedData['laptop_type'],
            'laptop_desc' => $validatedData['laptop_desc'],
            'laptop_condition' => $validatedData['laptop_condition'],
            'laptop_weight' => $validatedData['laptop_weight'],
            'laptop_price' => $validatedData['laptop_price'],
            'laptop_stock' => $validatedData['laptop_stock'],
        ]);

        if($request->hasFile('laptop_image')) {
            $files = $request->file('laptop_image');
            foreach($files as $file) {
                $name = time().rand(1,100).'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('img/product');
                $file->move($destinationPath, $name);
                $nameWithPath = 'img/product/'.$name;
                LaptopImage::create([
                    'laptop_id' => $laptop->id,
                    'laptop_image' => $nameWithPath,
                ]);
            }
        }

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
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaptopImage  $laptopimage
     * @return \Illuminate\Http\Response
     */
    public function destroyimage(LaptopImage $laptopimage)
    {
        if (File::exists($laptopimage->laptop_image)) {
            File::delete($laptopimage->laptop_image);
        }
        $laptopimage->delete();
        return redirect()->back()->with('success', 'Laptop image has been deleted');
    }
}
