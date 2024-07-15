<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgProduck extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'img_producks';
    protected $fillable = [
        'produck_id',
        'img'
    ];

    public function produck()
    {
        return $this->belongsTo(Produck::class, 'produck_id', 'id');
    }
}
