<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukTransaksi extends Model
{
    use HasFactory;

    protected $table = 'produk_transaksi';

    protected $fillable = [
        'transaksi_id',
        'jumlah',
        'produk_id',
    ];

    public $timestamps = false;

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }

    public function produk()
    {
        return $this->belongsTo(Produck::class, 'produk_id', 'id');
    }
}
