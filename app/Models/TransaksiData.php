<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiData extends Model
{
    use HasFactory;

    protected $table = 'transaksi_data';

    protected $fillable = [
        'transaksi_id',
        'metode_pengiriman',
        'alamat_id',
        'resi',
        'payment_metode_id',
        'bukti_pembayaran',
        'payment_note',
        'payment_time',
        'shiping_cost',
        'shiping_time',
        'shiping_done_time',
    ];

    public $timestamps = false;

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }

    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'alamat_id', 'id');
    }

    public function payment_metode()
    {
        return $this->belongsTo(PaymentMetode::class, 'payment_metode_id', 'id');
    }
}
