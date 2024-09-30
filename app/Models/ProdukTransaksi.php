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
        'cart_id',
    ];

    public $timestamps = false;

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }

    public function produck()
    {
        return $this->belongsTo(Produck::class, 'produk_id', 'id');
    }

    public function doc_pendukung()
    {
        return $this->hasOne(DocPendukung::class, 'produk_transaksi_id', 'id');
    }

    public function desain_produk_transaksi()
    {
        return $this->hasOne(DesainProdukTransaksi::class, 'produk_transaksi_id', 'id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }
}
