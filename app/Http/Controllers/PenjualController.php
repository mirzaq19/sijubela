<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenjualController extends Controller
{
    public function login()
    {
        return view('dashboard.penjual.login');
    }

    public function register()
    {
        return view('dashboard.penjual.register');
    }
}
