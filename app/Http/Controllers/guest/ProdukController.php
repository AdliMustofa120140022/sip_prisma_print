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


        if ($search) {
            $producks = Produck::where('deleted', false)->where('name', 'like', '%' . $search . '%')->orderBy('name', $order)->paginate(20);
        } else {
            $producks = Produck::where('deleted', false)->orderBy('name', $order)->paginate(20);
        }
        // dd($producks);
        return view('guest.product.index', compact('producks', 'search', 'order'));
    }

    public function show($id)
    {
        $producks  = Produck::where('deleted', false)
            ->inRandomOrder()->limit(8)->get();
        $produck = Produck::find($id);
        return view('guest.product.show', compact('produck', 'producks'));
    }
}
