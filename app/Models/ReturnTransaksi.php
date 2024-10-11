<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnTransaksi extends Model
{
    use HasFactory;

    protected $table = 'return_transaksis';

    protected $fillable = [
        'alasan',
        'bukti',
        'status',
        'reject_reason',
        'transaksi_id',
    ];

    public $timestamps = false;

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
