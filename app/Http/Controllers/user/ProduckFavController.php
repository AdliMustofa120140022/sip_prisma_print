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

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke favorit');
        // return response()->json(['message' => 'Added to favorites'], 200);
    }

    public function removeLove(Request $request)
    {
        $product_id = $request->query('produkc_id');

        $fav = ProduckFav::where('user_id', Auth::id())
            ->where('produk_id', $product_id)
            ->first();
        $fav->delete();
        return redirect()->back()->with('success', 'Produk berhasil dihapus dari favorit');
        // return response()->json(['message' => 'Removed from favorites'], 200);
    }

    public function index()
    {
        $produck_favs = ProduckFav::where('user_id', Auth::id())->get();
        return view('user.produk_fav.index', compact('produck_favs'));
    }
}
