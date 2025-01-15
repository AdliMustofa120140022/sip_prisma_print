<?php

namespace App\Http\Controllers\admin;

use App\Exports\TransaksiExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class exportController extends Controller
{
    public function index()
    {
        return view('admin.export.index');
    }


    public function export(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        if ($startDate == null || $endDate == null) {
            return redirect()->back()->with('error', 'Tanggal tidak boleh kosong');
        }
        // cek end date harus lebih besar dari start date dan tidak lebih dari date sekarang
        if ($endDate < $startDate) {
            return redirect()->back()->with('error', 'Tanggal akhir harus lebih besar dari tanggal awal');
        }

        if ($endDate > now()) {
            return redirect()->back()->with('error', 'Tanggal akhir tidak boleh lebih besar dari tanggal sekarang');
        }

        // cek start date tadak lebih dari sekarang
        if ($startDate > now()) {
            return redirect()->back()->with('error', 'Tanggal awal tidak boleh lebih besar dari tanggal sekarang');
        }

        $name = 'transaksi-' . $startDate . '-to-' . $endDate . '.xlsx';

        return Excel::download(new TransaksiExport($startDate, $endDate), $name);
    }
}
