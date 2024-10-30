<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BennerHome extends Model
{
    use HasFactory;

    protected $table = 'benner_homes';

    protected $fillable = [
        'img',
    ];
}
