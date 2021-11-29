<?php

namespace App\Http\Controllers;

use App\Models\SellerUser;
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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'seller_username' => 'required|min:5|unique:seller_users',
            'seller_full_name' => 'required|max:255',
            'seller_email' => 'required|email:dns|unique:seller_users',
            'seller_phone' => 'required|min:8|numeric',
            'seller_password' => 'required|min:6|max:255',
        ]);

        $validatedData['seller_password'] = bcrypt($validatedData['seller_password']);

        SellerUser::create($validatedData);

        return redirect()->route('penjual-login')->with('success', 'Registration successfull! Please login');
    }
}
