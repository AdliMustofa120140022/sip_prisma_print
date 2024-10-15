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
        $search = $request->query('search');


        $sub_katagori = SubKatagori::with(['produck' => function ($query) use ($search) {
            if ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->where('deleted', false);
            }
        }])->where('id', $params)->firstOrFail();

        // Get the filtered producks from the eager-loaded sub_katagori
        $producks = $sub_katagori->produck;
        return view('guest.katagori.index', compact('producks', 'sub_katagori', 'params', 'search'));
    }
}
