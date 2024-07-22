<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocPendukung extends Model
{
    use HasFactory;

    protected $table = 'doc_pendukung';

    protected $fillable = [
        'transaksi_data_id',
        'doc',
    ];

    public $timestamps = false;

    public function transaksi_data()
    {
        return $this->belongsTo(TransaksiData::class, 'transaksi_data_id', 'id');
    }
}
