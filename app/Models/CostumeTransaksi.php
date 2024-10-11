<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostumeTransaksi extends Model
{
    use HasFactory;

    protected $table = 'costume_transaksis';

    protected $fillable = [
        'transaksi_id',
        'product_name',
        'category_id',
        'sub_kategori_id',
        'theme',
        'length_cm',
        'width_cm',
        'height_gram',
        'thickness_cm',
        'sheet_count',
        'material',
        'color',
        'print_type',
        'print_resolution',
        'finishing',
        'ink_type',
        'order_quantity',
        'unit',
        'usage_deadline',
        'status',
        'note',
        'harga',
    ];

    public $timestamps = false;

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function katagori()
    {
        return $this->belongsTo(Katagori::class, 'category_id', 'id');
    }

    public function sub_katagori()
    {
        return $this->belongsTo(SubKatagori::class, 'sub_kategori_id', 'id');
    }
}
