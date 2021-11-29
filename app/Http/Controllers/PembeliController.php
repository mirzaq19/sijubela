<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function cart()
    {
        return view('dashboard.pembeli.cart');
    }

    public function login()
    {
        return view('dashboard.pembeli.login');
    }

    public function register()
    {
        return view('dashboard.pembeli.register');
    }
}
