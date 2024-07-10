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
        'category_id',
    ];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Katagori::class, 'category_id', 'id');
    }
}
