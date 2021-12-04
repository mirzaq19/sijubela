<?php

namespace App\Http\Controllers;

use App\Models\BuyerUser;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Testimonial;
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
        return view('dashboard.pembeli.order',[
            'title' => 'Semua Pesanan',
            'orders' => Auth::guard('buyer_user')->user()->orders()->get(),
        ]);
    }
    public function ordernotpay(){
        return view('dashboard.pembeli.order',[
            'title' => 'Belum Bayar',
            'orders' => Auth::guard('buyer_user')->user()->orders()->where('order_status','not_paid')->get(),
        ]);
    }
    public function orderpay(){
        return view('dashboard.pembeli.order',[
            'title' => 'Sudah Bayar',
            'orders' => Auth::guard('buyer_user')->user()->orders()->where('order_status','paid')->get(),
        ]);
    }
    public function orderpacking(){
        return view('dashboard.pembeli.order',[
            'title' => 'Dikemas',
            'orders' => Auth::guard('buyer_user')->user()->orders()->where('order_status','packing')->get(),
        ]);
    }
    public function ordershipping(){
        return view('dashboard.pembeli.order',[
            'title' => 'Dikirim',
            'orders' => Auth::guard('buyer_user')->user()->orders()->where('order_status','shipping')->get(),
        ]);
    }
    public function orderfinish(){
        return view('dashboard.pembeli.order',[
            'title' => 'Selesai',
            'orders' => Auth::guard('buyer_user')->user()->orders()->where('order_status','finished')->get(),
        ]);
    }
    public function ordercancel(){
        return view('dashboard.pembeli.order',[
            'title' => 'Dikemas',
            'orders' => Auth::guard('buyer_user')->user()->orders()->where('order_status','cancel')->get(),
        ]);
    }
    public function ordercanceladd(Request $request){
        $validatedData = $request->validate([
            'order_id' => 'required',
        ]);

        $order = Order::find($validatedData['order_id']);
        $order->order_status = 'cancel';
        $order->save();

        return redirect()->route('buyer-order.cancel')->with('canceladdsuccess', 'Order canceled successfully!');
    }

    public function orderaddpayment(Request $request){
        $validatedData = $request->validate([
            'order_id' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $order = Order::find($validatedData['order_id']);
        $order->order_status = 'paid';
        $order->save();

        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('img/payment');
        $image->move($destinationPath, $name);

        $payment = Payment::create([
            'order_id' => $validatedData['order_id'],
            'payment_account_name' => $validatedData['account_name'],
            'payment_account_number' => $validatedData['account_number'],
            'payment_bank_name' => $validatedData['bank_name'],
            'payment_status' => 'waiting',
            'payment_image' => $name,
        ]);

        return redirect()->route('buyer-order.all')->with('paymentsuccess', 'Payment added successfully!');
    }

    public function orderformtestimoni(Request $request){
        $validatedData = $request->validate([
            'id' => 'required',
        ]);
        $orderdetail = OrderDetail::find($validatedData['id']);
        return view('dashboard.pembeli.testimoni',[
            'laptop' => $orderdetail->laptop,
            'amount' => $orderdetail->order_detail_amount,
            'total' => $orderdetail->price_subtotal,
            'buyer_id' => $orderdetail->order->buyer_user->id,
            'order_detail_id' => $orderdetail->id,
        ]);
    }

    public function orderaddtestimoni(Request $request){
        $validatedData = $request->validate([
            'buyer_user_id' => 'required',
            'order_detail_id' => 'required',
            'laptop_id' => 'required',
            'rating' => 'required',
            'testimonial_desc' => 'required',
        ]);

        Testimonial::create($validatedData);
        $orderdetail = OrderDetail::find($validatedData['order_detail_id']);
        $orderdetail->reviewed = true;
        $orderdetail->save();

        return redirect()->route('buyer-order.all')->with('testimoniaddsuccess', 'Testimoni added successfully!');
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
