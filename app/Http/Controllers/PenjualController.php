<?php

namespace App\Http\Controllers;

use App\Models\SellerUser;
use App\Models\SellLaptop;
use App\Models\Bank;
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
        return view('dashboard.penjual.offer',[
            'offers' => SellLaptop::where('seller_user_id', Auth::guard('seller_user')->id())->where('sell_laptop_status', 0)->get(),
        ]);
    }

    public function offersaccepted(){
        return view('dashboard.penjual.offer-accepted',[
            'offers' => SellLaptop::where('seller_user_id', Auth::guard('seller_user')->id())->where('sell_laptop_status', 1)->get(),
        ]);
    }

    public function offersrejected(){
        return view('dashboard.penjual.offer-rejected',[
            'offers' => SellLaptop::where('seller_user_id', Auth::guard('seller_user')->id())->where('sell_laptop_status', 2)->get(),
        ]);
    }

    public function addlaptop(){
        return view('dashboard.penjual.add-laptop',[
            'bank' => Bank::where('seller_user_id', Auth::guard('seller_user')->id())->first(), 
        ]);
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

    public function offerdetail($id){
        return view('dashboard.penjual.offer-detail',[
            'sell_laptop' => SellLaptop::where('seller_user_id', Auth::guard('seller_user')->id())->where('id', $id)->first(),
        ]);
    }

    public function offeraccepteddetail($id){
        return view('dashboard.penjual.offer-accepted-detail',[
            'sell_laptop' => SellLaptop::where('seller_user_id', Auth::guard('seller_user')->id())->where('id', $id)->first(),
        ]);
    }

    public function offerrejecteddetail($id){
        return view('dashboard.penjual.offer-rejected-detail',[
            'sell_laptop' => SellLaptop::where('seller_user_id', Auth::guard('seller_user')->id())->where('id', $id)->first(),
        ]);
    }

    public function offerdetaildelete($id){
        SellLaptop::where('seller_user_id', Auth::guard('seller_user')->id())->where('id', $id)->delete();

        return redirect('/dashboard/offer')->with('success', 'Laptop has been deleted');
    }

    public function offeredit($id){
        return view('dashboard.penjual.offer-edit',[
            'sell_laptop' => SellLaptop::where('seller_user_id', Auth::guard('seller_user')->id())->where('id', $id)->first(),
        ]);
    }

    public function offereditupdate(Request $request, $id){
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

        SellLaptop::where('seller_user_id', Auth::guard('seller_user')->id())->where('id', $id)->update($validatedData);

        return redirect('/dashboard/offer')->with('success', 'Laptop has been updated');
    }

    public function setting(){
        return view('dashboard.penjual.setting-account',[
            'seller_user' => SellerUser::where('id', Auth::guard('seller_user')->id())->first(),
            'bank' => Bank::where('seller_user_id', Auth::guard('seller_user')->id())->first(),
        ]);
    }

    public function settingedit(){
        return view('dashboard.penjual.setting-edit-account',[
            'seller_user' => SellerUser::where('id', Auth::guard('seller_user')->id())->first(),
        ]);
    }

    public function settingeditupdate(Request $request){
        $validatedData = $request->validate([
            'seller_full_name' => 'required|max:255',
            'seller_email' => 'required|email:dns|unique:seller_users',
            'seller_phone' => 'required|min:8|numeric',
        ]);

        SellerUser::where('id', Auth::guard('seller_user')->id())->update($validatedData);

        return redirect('/dashboard/setting')->with('success', 'Account has been updated');
    }

    public function addbank(){
        return view('dashboard.penjual.setting-add-bank');
    }

    public function storebank(Request $request){
        $validatedData = $request->validate([
            'bank_name' => 'required',
            'account_name' => 'required',
            'account_number' => 'required|numeric',
        ]);

        $validatedData['seller_user_id'] = Auth::guard('seller_user')->id();

        Bank::create($validatedData);

        return redirect('/dashboard/setting')->with('success', 'Bank has been added');
    }

    public function editbank($id){
        return view('dashboard.penjual.setting-edit-bank',[
            'bank' => Bank::where('seller_user_id', Auth::guard('seller_user')->id())->where('id', $id)->first(),
        ]);
    }

    public function editbankupdate(Request $request, $id){
        $validatedData = $request->validate([
            'bank_name' => 'required',
            'account_name' => 'required',
            'account_number' => 'required|numeric',
        ]);

        Bank::where('seller_user_id', Auth::guard('seller_user')->id())->where('id', $id)->update($validatedData);

        return redirect('/dashboard/setting')->with('success', 'Bank has been updated');
    }
}
