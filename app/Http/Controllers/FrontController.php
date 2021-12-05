<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.index',[
            'laptops' => Laptop::all(),
        ]);
    }

    public function show(Laptop $laptop)
    {
        return view('front.product',[
            'laptop' => $laptop,
        ]);
    }

    public function listasus()
    {
        $laptops = Laptop::where('laptop_brand','Asus')->get();
        return view('front.list',[
            'title' => 'Asus',
            'laptops' => $laptops,
        ]);
    }
    public function listhp()
    {
        $laptops = Laptop::where('laptop_brand','HP')->get();
        return view('front.list',[
            'title' => 'HP',
            'laptops' => $laptops,
        ]);
    }
    public function listlenovo()
    {
        $laptops = Laptop::where('laptop_brand','Lenovo')->get();
        return view('front.list',[
            'title' => 'Lenovo',
            'laptops' => $laptops,
        ]);
    }
    public function listdell()
    {
        $laptops = Laptop::where('laptop_brand','Dell')->get();
        return view('front.list',[
            'title' => 'Dell',
            'laptops' => $laptops,
        ]);
    }
    public function listacer()
    {
        $laptops = Laptop::where('laptop_brand','Acer')->get();
        return view('front.list',[
            'title' => 'Acer',
            'laptops' => $laptops,
        ]);
    }
    public function listapple()
    {
        $laptops = Laptop::where('laptop_brand','Apple')->get();
        return view('front.list',[
            'title' => 'Apple',
            'laptops' => $laptops,
        ]);
    }
    public function listtoshiba()
    {
        $laptops = Laptop::where('laptop_brand','Toshiba')->get();
        return view('front.list',[
            'title' => 'Toshiba',
            'laptops' => $laptops,
        ]);
    }
    public function listaxioo()
    {
        $laptops = Laptop::where('laptop_brand','Axioo')->get();
        return view('front.list',[
            'title' => 'Axioo',
            'laptops' => $laptops,
        ]);
    }
}
