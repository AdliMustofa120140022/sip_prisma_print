<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Produck;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $producks = Produck::paginate(10);

        // dd($producks);
        return view('admin.porduct.index', compact('producks'));
    }

    public function create()
    {
        return view('admin.product.create');
    }
}
