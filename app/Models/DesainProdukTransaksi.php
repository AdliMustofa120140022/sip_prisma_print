<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesainProdukTransaksi extends Model
{
    use HasFactory;

    protected $table = 'desain_produk_transaksi';

    protected $fillable = [
        'transaksi_id',
        'desain',
        'status', // 'pending', 'approved', 'rejected'
        'catatan',
    ];

    public $timestamps = false;

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }
}
