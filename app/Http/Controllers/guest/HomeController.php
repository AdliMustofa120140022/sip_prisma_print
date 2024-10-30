<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\BennerHome;
use App\Models\Katagori;
use App\Models\Produck;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {

        $katagoris = Katagori::all()->sortBy('id');
        $param = $request->query('p', $katagoris->first()->id);

        $producks = Produck::where('deleted', false)->whereHas('sub_katagori', function ($query) use ($param) {
            $query->where('category_id', $param);
        })->inRandomOrder()
            ->take(6)
            ->get();

        $benner_homes = BennerHome::whereNotNull('img')->get();

        return view('guest.home', compact('katagoris', 'producks', 'benner_homes', 'param'));
    }

    public function about()
    {
        return view('guest.about.about');
    }
}
