<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ReturnTransaksi;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required:in:approved,rejected',
            'reject_reason' => 'required_if:status,rejected'
        ]);

        $return = ReturnTransaksi::find($id);

        $return->update([
            'status' => $request->status,
            'reject_reason' => $request->reject_reason
        ]);

        if ($request->status == 'approved') {
            $return->transaksi->update([
                'status' => 'desain'
            ]);
        } else {
            $return->transaksi->update([
                'status' => 'kirim'
            ]);
        }

        return redirect()->back()->with('success', 'Status return berhasil diubah');
    }
}
