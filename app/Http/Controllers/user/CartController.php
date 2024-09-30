<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function  index(Request $request)
    {
        $carts = Cart::where('user_id', Auth::id())
            ->orderBy('id', 'asc')
            ->get();


        return view('user.cart.index', compact('carts'));
    }

    public function store(Request $request)
    {

        $type = $request->query('type');

        // dd($type);

        $request->validate([
            'product_id' => 'required|exists:producks,id',
            'qty' => 'required|integer|min:1'
        ]);

        $cart = Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'quantity' => $request->qty
        ]);

        if ($type == 'buy') {
            return redirect()->route('user.cart.index', [
                'cart_id' => $cart->id
            ]);
        } else {
            return redirect()->back()->with('success', 'Product added to cart successfully');
        }
        // return redirect()->back()->with('success', 'Product added to cart successfully');
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->back()->with('success', 'Product removed from cart successfully');
    }
}
