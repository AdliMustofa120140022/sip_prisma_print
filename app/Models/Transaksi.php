<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    protected $fillable = [
        'status',
        'transaksi_code',
        'status', // , make, payment, desain, cetak, kirim, selesai
        'total_harga',
        'user_id',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Get the highest product ID and increment it
            $maxId = static::max('id') + 1;
            $model->transaksi_code = 'TR-' . str_pad($maxId, 3, '0', STR_PAD_LEFT);
        });
    }

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function transaksi_data()
    {
        return $this->hasOne(TransaksiData::class, 'transaksi_id', 'id');
    }

    public function produk_transaksi()
    {
        return $this->hasMany(ProdukTransaksi::class, 'transaksi_id', 'id');
    }

    public function desain_produk_transaksi()
    {
        return $this->hasOne(DesainProdukTransaksi::class, 'transaksi_id', 'id');
    }
}
