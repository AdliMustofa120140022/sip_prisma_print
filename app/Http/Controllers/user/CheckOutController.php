<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    //
    public function index()
    {
        return view('user.checkout.index');
    }

    //buatkah function store untuk menyimpan data checkout?
    public function store(Request $request)
    {
        //validasi data
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'payment_method' => 'required'
        ]);

        //simpan data ke database
        // $checkout = Checkout::create([
        //     'user_id' => auth()->id(),
        //     'name' => $request->name,
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        //     'city' => $request->city,
        //     'postal_code' => $request->postal_code,
        //     'payment_method' => $request->payment_method,
        //     'status' => 'pending'
        // ]);

        // //simpan data ke database
        // foreach (Cart::where('user_id', auth()->id())->get() as $cart) {
        //     Order::create([
        //         'checkout_id' => $checkout->id,
        //         'product_id' => $cart->product_id,
        //         'quantity' => $cart->quantity,
        //         'price' => $cart->product->price
        //     ]);
        //     $cart->delete();
        // }

        // return redirect()->route('user.dashboard')->with('success', 'Checkout successfully');
    }
}
