<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Katagori;
use App\Models\Produck;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index( Request $request )
    {
        $param = $request->query('p', 'kantor');

        // dd($param);
        
        $katagoris = Katagori::all()->sortBy('id');

        // if( $param == 'promosi' )
        // {
        //     $producks = Produck::paginate(9);
        //     return view('guest.home', compact('katagoris', 'producks'));
        // }

        $producks = Katagori::where('nama', $param)->first()->sub_katagori;

        return view('guest.home', compact('katagoris', 'producks'));
    }
}
