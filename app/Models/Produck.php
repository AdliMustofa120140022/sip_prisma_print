<?php

namespace App\Models;

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
    ];

    public $timestamps = false;

    // public function sub_katagori()
    // {
    //     return $this->belongsTo(SubKatagori::class, 'sub_kategori_id', 'id');
    // }


}
