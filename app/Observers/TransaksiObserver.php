<?php

namespace App\Observers;

use App\Models\Transaksi;
use Carbon\Carbon;

class TransaksiObserver
{
    /**
     * Handle the Transaksi "retrieved" event.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return void
     */

    public function retrieved(Transaksi $transaksi)
    {
        if (
            $transaksi->status == 'payment'
            && $transaksi->transaksi_data->payment_status == 'unpaid'
            && $transaksi->transaksi_data->payment_metode_id != '1'
            && Carbon::parse($transaksi->created_at)->endOfDay()->isPast()
        ) {
            $transaksi->status = 'gagal';
            $transaksi->transaksi_data->payment_note = 'Waktu pembayaran habis';
            $transaksi->transaksi_data->save();
            $transaksi->save();

            foreach ($transaksi->produk_transaksi as $produk_transaksi) {
                if ($produk_transaksi->produck) {
                    $produk_transaksi->produck->data_produck->stok += $produk_transaksi->jumlah;
                    $produk_transaksi->produck->data_produck->save();
                }
            }
        }
    }
}
