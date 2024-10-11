<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKatagori extends Model
{
    use HasFactory;

    protected $table = 'sub_katagoris';

    protected $fillable = [
        'name',
        'description',
        'image',
        'category_id',
    ];

    public $timestamps = false;

    public function katagori()
    {
        return $this->belongsTo(Katagori::class, 'category_id', 'id');
    }

    public function produck()
    {
        return $this->hasMany(Produck::class, 'sub_kategori_id', 'id');
    }

    public function costume_transaksi()
    {
        return $this->hasMany(CostumeTransaksi::class, 'sub_kategori_id', 'id');
    }
}
