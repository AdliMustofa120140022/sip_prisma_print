<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\SubKatagori;
use Illuminate\Http\Request;

class katagoriController extends Controller
{
    public function index(Request $request)
    {

        $sub_katagori = SubKatagori::first();
        $params = $request->query('p', $sub_katagori->id);

        $sub_katagori = SubKatagori::where('id', $params)->first();
        $producks = $sub_katagori->produck;
        return view('guest.katagori.index', compact('producks', 'sub_katagori', 'params'));
    }
}
