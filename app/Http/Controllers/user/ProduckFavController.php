<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\ProduckFav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProduckFavController extends Controller
{
    public function addLove(Request $request)
    {
        // add id from param
        $product_id = $request->query('produkc_id');

        $fav = ProduckFav::create([
            'user_id' => Auth::id(),
            'produk_id' => $product_id
        ]);

        return redirect()->back()->with('success', 'Product added to favorite successfully');
    }

    public function removeLove(Request $request)
    {
        $product_id = $request->query('produkc_id');
        $fav = ProduckFav::where('user_id', Auth::id())
            ->where('produk_id', $product_id)
            ->first();
        $fav->delete();
        return redirect()->back()->with('success', 'Product removed from favorite successfully');
    }
}
