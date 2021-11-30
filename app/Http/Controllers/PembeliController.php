<?php

namespace App\Http\Controllers;

use App\Models\BuyerUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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



    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'buyer_username' => 'required|min:5',
            'buyer_password' => 'required|min:6|max:255',
        ]);

        if (Auth::guard('buyer_user')->attempt(['buyer_username' => $credentials['buyer_username'], 'password' => $credentials['buyer_password']])) {
            $request->session()->regenerate();
         
            return redirect()->intended('/');
        }

        return back()->with('error', 'Invalid username or password');
    }

    public function logout(Request $request){
        Auth::guard('buyer_user')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('beranda');
    }
}
