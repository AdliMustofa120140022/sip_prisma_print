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
            $table->foreignId('prduck_id')->references('id')->on('producks');
            $table->integer('stok');
            $table->integer('lebar');
            $table->integer('panjang');
            $table->integer('tinggi');
            $table->integer('berat');
            $table->string('bahan');
            $table->string('warna');
            $table->string('jenis_cetak');
            $table->string('resolusi');
            $table->string('finishing');
            $table->string('kertas');
            $table->float('ketebalan_kertas');
            $table->string('tinta');
            $table->integer('harga_satuan');
            $table->integer('harga_grosir')->nullable();
            $table->integer('minimal_grosir')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->date('tanggal_kadaluarsa')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('supplier')->nullable();
        });

        Schema::create('img_producks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prduck_id')->references('id')->on('producks');
            $table->string('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_producks');
        Schema::dropIfExists('img_producks');
    }
};
