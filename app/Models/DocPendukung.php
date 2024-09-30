<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocPendukung extends Model
{
    use HasFactory;

    protected $table = 'doc_pendukung';

    protected $fillable = [
        'produk_transaksi_id',
        'doc',
        'link',
        'catatan',
    ];

    public $timestamps = false;


    public function produk_transaksi()
    {
        return $this->belongsTo(ProdukTransaksi::class, 'produk_transaksi_id', 'id');
    }
}
