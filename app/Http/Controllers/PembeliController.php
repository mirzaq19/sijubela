<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function cart()
    {
        return view('dashboard.pembeli.cart');
    }
}
