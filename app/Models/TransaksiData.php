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
        'nama_penerima',
        'metode_pengiriman',
        'alamat_pengiriman',
        'resi',
        'no_hp',
        'metode_pembayaran',
        'bukti_pembayaran',
        'catatan',
    ];

    public $timestamps = false;

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }
}
