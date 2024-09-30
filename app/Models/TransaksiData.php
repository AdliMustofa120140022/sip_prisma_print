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
        'metode_pembayaran',
        'bukti_pembayaran',
        'payment_note',
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
}
