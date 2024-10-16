<?php

namespace App\Http\Controllers\admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\PaymentMetode;
use Illuminate\Http\Request;

class PaymentMetodeController extends Controller
{
    public function index()
    {
        $payment_metodes = PaymentMetode::all();
        return view('admin.payment_metode.index', compact('payment_metodes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'rekening' => 'nullable',
        ]);


        if ($request->type == 'qris') {
            $request->validate([
                'qr_code' => 'required|file|mimes:jpg,jpeg,png|max:5048',
            ]);
        }

        $payment_metode = PaymentMetode::create([
            'name' => $request->name,
            'type' => $request->type,
            'rekening' => $request->rekening,
        ]);

        if ($request->type == 'qris') {

            $qr_code_name = FileHelper::uploadFile($request->qr_code, 'payment_metode');
            $payment_metode->qr_code = $qr_code_name;
            $payment_metode->save();
        }

        return redirect()->back()->with('success', 'Metode pembayaran berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'rekening' => 'nullable',
        ]);

        $payment_metode = PaymentMetode::find($id);
        $payment_metode->name = $request->name;
        $payment_metode->type = $request->type;
        $payment_metode->rekening = $request->rekening;
        $payment_metode->save();

        return redirect()->back()->with('success', 'Metode pembayaran berhasil diupdate');
    }

    public function updateQrCode(Request $request, $id)
    {
        $request->validate([
            'qr_code' => 'required|file|mimes:jpg,jpeg,png|max:5048',
        ]);

        $payment_metode = PaymentMetode::find($id);

        $qr_code_name = FileHelper::uploadFile($request->qr_code, 'payment_metode');
        $payment_metode->qr_code = $qr_code_name;
        $payment_metode->save();

        return redirect()->back()->with('success', 'QR Code berhasil diupdate');
    }

    public function destroy($id)
    {
        $payment_metode = PaymentMetode::find($id);
        $payment_metode->delete();

        return redirect()->back()->with('success', 'Metode pembayaran berhasil dihapus');
    }
}
