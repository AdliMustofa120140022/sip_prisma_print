<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Katagori;
use App\Models\Produck;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return redirect()->route('guest.dashboard');
    }
}
