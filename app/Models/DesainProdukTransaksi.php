<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesainProdukTransaksi extends Model
{
    use HasFactory;

    protected $table = 'desain_produk_transaksi';

    protected $fillable = [
        'produk_transaksi_id',
        'desain',
        'status', // 'pending', 'approved', 'rejected'
        'catatan',
    ];

    public $timestamps = false;

    public function produk_transaksi()
    {
        return $this->belongsTo(ProdukTransaksi::class, 'produk_transaksi_id', 'id');
    }
}
