<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduckFav extends Model
{
    use HasFactory;

    protected $table = 'produck_favs';


    protected $fillable = [
        'user_id',
        'produk_id',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function produck()
    {
        return $this->belongsTo(Produck::class, 'produk_id', 'id');
    }
}
