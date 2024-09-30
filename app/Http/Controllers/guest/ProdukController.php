<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Produck;
use App\Models\SubKatagori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $order = $request->query('order', 'asc');
        $search = $request->query('search');
        // $sub_katagori = SubKatagori::first();
        // $params = $request->query('p', $sub_katagori->id);

        // $sub_katagori = SubKatagori::where('id', $params)->first();
        // $producks = $sub_katagori->produck;
        // return view('guest.product.index', compact('producks', 'sub_katagori', 'params'));

        // $producks = Produck::inRandomOrder()->orderBy('name', 'desc')->paginate(12);

        if ($search) {
            $producks = Produck::where('name', 'like', '%' . $search . '%')->orderBy('name', $order)->paginate(20);
        } else {
            $producks = Produck::orderBy('name', $order)->paginate(20);
        }
        // dd($producks);
        return view('guest.product.index', compact('producks', 'search', 'order'));
    }

    public function show($id)
    {
        $producks  = Produck::inRandomOrder()->limit(8)->get();
        $produck = Produck::find($id);
        return view('guest.product.show', compact('produck', 'producks'));
    }
}
