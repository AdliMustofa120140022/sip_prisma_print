<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katagori extends Model
{
    use HasFactory;

    protected $table = 'katagoris';
    protected $fillable = ['nama'];

    public $timestamps = false;

    public function sub_katagori()
    {
        return $this->hasMany(SubKatagori::class, 'category_id', 'id');
    }

    public function costume_transaksi()
    {
        return $this->hasMany(CostumeTransaksi::class, 'category_id', 'id');
    }
}
