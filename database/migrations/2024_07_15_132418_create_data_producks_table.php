<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_producks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prduck_id')->constrained('producks');
            $table->integer('stok');
            $table->integer('harga');
            $table->integer('lebar');
            $table->integer('panjang');
            $table->integer('tinggi');
            $table->integer('berat');
            $table->string('warna');
            $table->string('jensi_cetak');
            $table->string('resolusi');
            $table->string('finishing');
            $table->string('kertas');
            $table->string('tinta');
            $table->integer('harga_satuan');
            $table->integer('harga_grosir')->nullable();
            $table->integer('minimal_grosir')->nullable();
            $table->date('tanggal_masuk');
            $table->date('tanggal_kadaluarsa')->nullable();
            $table->string('lokasi');
            $table->string('supplier');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_producks');
    }
};
