<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'quantity'];

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Produck::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produk_transaksi()
    {
        return $this->hasOne(ProdukTransaksi::class, 'cart_id', 'id');
    }
}
