<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    protected $fillable = [
        'status',
        'transaksi_code',
        'tansaktion_type',
        'status',
        'total_harga',
        'user_id',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $maxId = static::max('id') + 1;
            $today = Carbon::now()->format('Ymd');
            $model->transaksi_code = 'PP-' . $today . str_pad($maxId, 4, '0', STR_PAD_LEFT);
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

    public function return_transaksi()
    {
        return $this->hasOne(ReturnTransaksi::class, 'transaksi_id', 'id');
    }

    public function costume_transaksi()
    {
        return $this->hasOne(CostumeTransaksi::class, 'transaksi_id', 'id');
    }
}
