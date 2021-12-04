<?php

namespace App\Http\Controllers;

use App\Models\BuyerUser;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembeliController extends Controller
{
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

    public function cart()
    {
        return view('dashboard.pembeli.cart',[
            'carts' => Cart::where('buyer_user_id', Auth::guard('buyer_user')->user()->id)->get(),
        ]);
    }

    public function cartadd(Request $request){
        $validatedData = $request->validate([
            'buyer_user_id' => 'required',
            'laptop_id' => 'required',
            'qty' => 'required|numeric',
            'notelaptop' => 'max:255',
        ]);

        $cart = Cart::where('buyer_user_id', $validatedData['buyer_user_id'])->where('laptop_id', $validatedData['laptop_id'])->first();

        if($cart){
            $cart->cart_amount = $cart->cart_amount + $validatedData['qty'];
            $cart->cart_note = $validatedData['notelaptop'];
            $cart->save();
        }else{
            Cart::create([
                'laptop_id' => $validatedData['laptop_id'],
                'buyer_user_id' => $validatedData['buyer_user_id'],
                'cart_amount' => $validatedData['qty'],
                'cart_note' => $validatedData['notelaptop'],
            ]);
        }

        return redirect()->route('product',$validatedData['laptop_id'])->with('success', 'Item added to cart');
    }

    public function cartdelete(Cart $cart){
        $cart->delete();
        return redirect()->route('cart')->with('success', 'Item deleted from cart');
    }

    public function checkout(Request $request){
        $idcarts = explode(',',$request->idcarts);
        $carts = Cart::whereIn('id',$idcarts)->get();
        $total = 0;
        $cost = 0;
        foreach($carts as $cart){
            $total = $total + ($cart->cart_amount * $cart->laptop->laptop_price);
            $cost = $cost + ($cart->cart_amount * $cart->laptop->laptop_weight*10000);
        }
        return view('dashboard.pembeli.checkout',[
            'idcarts' => $request->idcarts,
            'carts' => $carts,
            'cost' => $cost,
            'total' => $total,
            'address' =>Auth::guard('buyer_user')->user()->addresses()->first(),
        ]);
    }

    public function orderadd(Request $request){
        $validatedData = $request->validate([
            'shipping_address' => 'required|min:15',
            'shipping_cost' => 'required',
            'idcarts' => 'required',
            'total_price' => 'required',
        ]);

        $idcarts = explode(',',$validatedData['idcarts']);
        $carts = Cart::whereIn('id',$idcarts)->get();

        $neworder = Order::create([
            'order_status' => 'not_paid',
            'shipping_address' => $validatedData['shipping_address'],
            'shipping_status' => 'Belum dikirim',
            'shipping_number' => 'not_shipped',
            'shipping_cost' => $validatedData['shipping_cost'],
            'buyer_user_id' => Auth::guard('buyer_user')->user()->id,
            'total_price' => $validatedData['total_price'],
        ]);

        foreach($carts as $cart){
            OrderDetail::create([
                'order_id' => $neworder->id,
                'laptop_id' => $cart->laptop_id,
                'order_detail_amount' => $cart->cart_amount,
                'order_detail_note' => $cart->cart_note,
                'price_subtotal' => $cart->cart_amount * $cart->laptop->laptop_price,
                'weight_subtotal' => $cart->cart_amount * $cart->laptop->laptop_weight,
            ]);
        }

        Cart::whereIn('id',$idcarts)->delete();
        
        return redirect()->route('buyer-order.all')->with('orderaddsuccess', 'Order added successfully!');
    }

    public function orderindex(){
        return redirect()->route('buyer-order.all');
    }
    public function orderall(){
        return view('dashboard.pembeli.order');
    }
    public function ordernotpay(){
        return view('dashboard.pembeli.order');
    }
    public function orderpacking(){
        return view('dashboard.pembeli.order');
    }
    public function ordershipping(){
        return view('dashboard.pembeli.order');
    }
    public function orderfinish(){
        return view('dashboard.pembeli.order');
    }
    public function ordercancel(){
        return view('dashboard.pembeli.order');
    }

    public function accountindex()
    {
        return redirect()->route('buyer-account.detail');
    }
    public function accountdetail(){
        return view('dashboard.pembeli.account',[
            'pagetitle' => 'Detail',
            'user' => Auth::guard('buyer_user')->user(),
        ]);
    }
    public function accountdetailupdate(Request $request){
        if($request->input('buyer_password') != null){
            $validatedData = $request->validate([
                'buyer_full_name' => 'required|max:255',
                'buyer_phone' => 'required|min:8|numeric',
                'buyer_password' => 'min:6|max:255',
            ]);
            $validatedData['buyer_password'] = bcrypt($validatedData['buyer_password']);
        }else{
            $validatedData = $request->validate([
                'buyer_full_name' => 'required|max:255',
                'buyer_phone' => 'required|min:8|numeric',
            ]);
        }

        $userupdate = BuyerUser::find($request->id);

        $userupdate->update($validatedData);

        return redirect()->route('buyer-account.detail')->with('success', 'Detail changes successfully saved!');
    }
    public function accountaddress(){
        return view('dashboard.pembeli.account',[
            'pagetitle' => 'Alamat',
            'address' => Auth::guard('buyer_user')->user()->addresses()->first(),
            'userid' => Auth::guard('buyer_user')->user()->id,
        ]);
    }
    public function accountaddressupdate(Request $request){
        // dd($request->all());
        $user = BuyerUser::find($request->id);
        $validatedData = $request->validate([
            'full_address' => 'required|max:255',
            'province' => 'required|max:255',
            'district' => 'required|max:255',
            'subdistrict' => 'required|max:255',
            'village' => 'required|max:255',
            'postal_code' => 'required|max:5',
        ]);

        $user->addresses()->updateOrCreate(
            ['buyer_user_id' => $request->id],
            $validatedData
        );

        return redirect()->route('buyer-account.address')->with('success', 'Address changes successfully saved!');
    }
}
