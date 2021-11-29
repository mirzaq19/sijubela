<?php

namespace App\Http\Controllers;

use App\Models\BuyerUser;
use Illuminate\Contracts\Support\ValidatedData;
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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'buyer_username' => 'required|min:5|unique:buyer_users',
            'buyer_full_name' => 'required|max:255',
            'buyer_email' => 'required|email:dns|unique:buyer_users',
            'buyer_phone' => 'required|min:8|numeric',
            'buyer_password' => 'required|min:6|max:255',
        ]);

        $validatedData['buyer_password'] = bcrypt($validatedData['buyer_password']);

        BuyerUser::create($validatedData);

        return redirect()->route('pembeli-login')->with('success', 'Registration successfull! Please login');
    }
}
