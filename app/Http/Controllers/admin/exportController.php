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

        $name = 'transaksi-' . $startDate . '-to-' . $endDate . '.xlsx';

        return Excel::download(new TransaksiExport($startDate, $endDate), $name);
    }
}
