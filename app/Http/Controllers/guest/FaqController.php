<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //\
    public function index(Request $request)
    {
        $param = $request->query('q', 'cara_pemesanan');

        return view('guest.faq', compact('param'));
    }
}
