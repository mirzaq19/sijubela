<?php

namespace App\Http\Controllers;

use App\Models\SellerUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function dashboard(){
        return view('dashboard.penjual.dashboard');
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

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'seller_username' => 'required|min:5',
            'seller_password' => 'required|min:6|max:255',
        ]);

        if (Auth::guard('seller_user')->attempt(['seller_username' => $credentials['seller_username'], 'password' => $credentials['seller_password']])) {
            $request->session()->regenerate();
            
            return redirect()->intended('/dashboard');
        }

        return back()->with('error', 'Invalid username or password');
    }

    public function logout(Request $request){
        Auth::guard('seller_user')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('beranda');
    }
}
