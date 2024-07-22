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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('transaksi_code')->unique();
            $table->enum('status', ['cart', 'make',  'payment', 'desain', 'cetak', 'kirim', 'selesai']);
            $table->integer('total_harga')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });

        Schema::create('transaksi_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->constrained('transaksis');
            $table->string('nama_penerima')->nullable();
            $table->string('metode_pengiriman')->nullable();
            $table->string('alamat_pengiriman')->nullable();
            $table->string('resi')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('metode_pembayaran')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->string('catatan')->nullable();
        });

        Schema::create('doc_pendukung', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_data_id')->constrained('transaksi_data');
            $table->string('doc');
        });

        schema::create('produk_transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->constrained('transaksis');
            $table->foreignId('produk_id')->references('id')->on('producks');
        });

        Schema::create('desain_produk_transaksi', function (Blueprint $table) {
            $table->foreignId('transaksi_id')->constrained('transaksis');
            $table->string('desain')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected']);
            $table->string('catatan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
        Schema::dropIfExists('transaksi_data');
        Schema::dropIfExists('produk_transaksi');
        Schema::dropIfExists('desain_produk_transaksi');
    }
};
