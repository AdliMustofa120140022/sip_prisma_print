<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produck extends Model
{
    use HasFactory;

    protected $table = 'producks';

    protected $fillable = [
        'name',
        'description',
        'sub_kategori_id',
        'deleted',
    ];
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $maxId = static::max('id') + 1;
            $today = Carbon::now()->format('Ymd');
            $model->prduck_code = 'PP-' . $today . '-' . str_pad($maxId, 4, '0', STR_PAD_LEFT);
        });
    }

    public $timestamps = false;

    public function img_produck()
    {
        return $this->hasMany(ImgProduck::class, 'prduck_id', 'id');
    }

    public function data_produck()
    {
        return $this->hasOne(DataProduck::class, 'prduck_id', 'id');
    }

    public function sub_katagori()
    {
        return $this->belongsTo(SubKatagori::class, 'sub_kategori_id', 'id');
    }

    public function produk_transaksi()
    {
        return $this->hasMany(ProdukTransaksi::class, 'produk_id', 'id');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }

    public function produck_fav()
    {
        return $this->hasMany(ProduckFav::class, 'produk_id', 'id');
    }
}
