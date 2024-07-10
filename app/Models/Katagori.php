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

    public function producks()
    {
        return $this->hasMany(Produck::class, 'category_id', 'id');
    }
}
