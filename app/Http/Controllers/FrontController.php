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
}
