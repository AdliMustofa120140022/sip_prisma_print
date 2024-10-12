<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {

        $years = Transaksi::selectRaw('YEAR(created_at) year')
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->pluck('year');

        $selectedYear = $request->query('year', now()->year);

        $transaksis = Transaksi::selectRaw('MONTH(created_at) as month, SUM(total_harga) as total')
            ->whereYear('created_at', $selectedYear)
            ->groupBy('month')
            ->pluck('total', 'month');

        $monthlyData = array_fill(1, 12, 0); // [1 => 0, 2 => 0, ..., 12 => 0]

        foreach ($transaksis as $month => $total) {
            $monthlyData[$month] = $total;
        }
        // dd($years, $monthlyData);

        return view('admin.dashboard', compact('years', 'selectedYear', 'monthlyData'));
    }
}
