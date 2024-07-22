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
        $sub_katagori = SubKatagori::first();
        $params = $request->query('p', $sub_katagori->id);

        $sub_katagori = SubKatagori::where('id', $params)->first();
        $producks = $sub_katagori->produck;
        return view('guest.product.index', compact('producks', 'sub_katagori', 'params'));
    }

    public function show($id)
    {
        $produck = Produck::find($id);
        return view('guest.product.show', compact('produck'));
    }
}
