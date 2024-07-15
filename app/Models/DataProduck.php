<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataProduck extends Model
{
    use HasFactory;

    protected $table = 'data_producks';

    protected $fillable = [
        'prduck_id',
        'stok',
        'harga',
        'lebar',
        'panjang',
        'tinggi',
        'berat',
        'warna',
        'jensi_cetak',
        'resolusi',
        'finishing',
        'kertas',
        'tinta',

        'harga_satuan',
        'harga_grosir',
        'minimal_grosir',

        'tanggal_masuk',
        'tanggal_kadaluarsa',
        'lokasi',
        'supplier',
    ];

    public $timestamps = false;

    public function produck()
    {
        return $this->belongsTo(Produck::class, 'prduck_id', 'id');
    }
}
