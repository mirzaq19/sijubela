<?php

namespace App\Http\Controllers;

use App\Models\SellerUser;
use App\Models\SellLaptop;
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

    public function dashboard(){
        return view('dashboard.penjual.dashboard',[
            'laptop' => SellLaptop::where('seller_user_id', Auth::guard('seller_user')->id())->get(),
            'laptop_waiting' => SellLaptop::where('seller_user_id', Auth::guard('seller_user')->id())->where('sell_laptop_status', 0)->get(),
            'laptop_accepted' => SellLaptop::where('seller_user_id', Auth::guard('seller_user')->id())->where('sell_laptop_status', 1)->get(),
            'laptop_rejected' => SellLaptop::where('seller_user_id', Auth::guard('seller_user')->id())->where('sell_laptop_status', 2)->get(),
        ]);
    }

    public function offers(){
        return view('dashboard.penjual.dashboardoffer',[
            'offers' => SellLaptop::where('seller_user_id', Auth::guard('seller_user')->id())->where('sell_laptop_status', 0)->get(),
        ]);
    }

    public function offersaccepted(){
        return view('dashboard.penjual.dashboardofferaccepted',[
            'offers' => SellLaptop::where('seller_user_id', Auth::guard('seller_user')->id())->where('sell_laptop_status', 1)->get(),
        ]);
    }

    public function offersrejected(){
        return view('dashboard.penjual.dashboardofferrejected',[
            'offers' => SellLaptop::where('seller_user_id', Auth::guard('seller_user')->id())->where('sell_laptop_status', 2)->get(),
        ]);
    }

    public function addlaptop(){
        return view('dashboard.penjual.dashboardaddlaptop');
    }

    public function storelaptop(Request $request){
        $validatedData = $request->validate([
            'sell_laptop_name' => 'required',
            'sell_laptop_brand' => 'required',
            'sell_laptop_type' => 'required',
            'sell_laptop_desc' => 'required',
            'sell_laptop_condition' => 'required',
            'sell_laptop_weight' => 'required|numeric',
            'sell_laptop_price' => 'required|numeric',
            'sell_laptop_usage_time' => 'required|numeric',
        ]);

        $validatedData['seller_user_id'] = Auth::guard('seller_user')->id();

        SellLaptop::create($validatedData);

        return redirect('/dashboard')->with('success', 'Laptop has been added. Please wait for admin to accept your offer');
    }
}
