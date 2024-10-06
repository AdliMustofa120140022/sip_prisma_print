<?php

namespace App\Observers;

use App\Models\Transaksi;
use Carbon\Carbon;

class DesainObserver
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
            $transaksi->status == 'desain'
            && Carbon::parse($transaksi->transaksi_data->desain_time)->endOfDay()->isPast()
        ) {
            foreach ($transaksi->produk_transaksi as $produk_transaksi) {
                if ($produk_transaksi->desain_produk_transaksi->status == 'pending') {
                    $produk_transaksi->desain_produk_transaksi->status = 'rejected';
                    $produk_transaksi->desain_produk_transaksi->catatan = 'Waktu desain habis';
                    $produk_transaksi->desain_produk_transaksi->save();
                }
            }
        }
    }
}
