<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function  index()
    {
        $carts = Cart::where('user_id', auth()->id())
            ->orderBy('id', 'asc')
            ->get();
        return view('user.cart.index', compact('carts'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'product_id' => 'required|exists:producks,id',
            'qty' => 'required|integer|min:1'
        ]);

        Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'quantity' => $request->qty
        ]);

        // session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully');
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('success', 'Product removed from cart successfully');
    }
}
