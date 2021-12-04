<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->guard('buyer_user')->user();
        return view('dashboard.pembeli.cart',[
            'carts' => $user->carts()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            'address' =>auth()->guard('buyer_user')->user()->addresses()->first(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index')->with('success', 'Item deleted from cart');
    }
}
