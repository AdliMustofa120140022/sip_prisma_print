<?php

namespace App\Observers;

use App\Models\Transaksi;
use Carbon\Carbon;

class PengirimanObserver
{
    /**
     * Handle the Transaksi "retrieved" event.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return void
     */

    public function retrieved(Transaksi $transaksi)
    {
        if ($transaksi->status == 'kirim') {
            // Tentukan tanggal pengiriman dari database
            $batasWaktuPengiriman = Carbon::parse($transaksi->transaksi_data->shiping_time)->addWeek(3);

            // $batasWaktuPengiriman = Carbon::parse($transaksi->transaksi_data->shiping_time)->addMonth();

            if (Carbon::now()->greaterThanOrEqualTo($batasWaktuPengiriman)) {
                $transaksi->status = 'selesai';
                $transaksi->save();
            }
        }
    }
}
