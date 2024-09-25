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
            $table->enum('status', ['make', 'payment', 'payment-done', 'desain', 'cetak', 'kirim', 'selesai'])->default('make');
            $table->integer('total_harga')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });

        Schema::create('transaksi_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->constrained('transaksis');
            $table->string('metode_pengiriman')->nullable();
            $table->foreignId('alamat_id')->constrained('alamats');
            $table->string('resi')->nullable();
            $table->string('metode_pembayaran')->nullable();
            $table->string('bukti_pembayaran')->nullable();
        });

        schema::create('produk_transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->constrained('transaksis');
            $table->integer('jumlah');
            $table->foreignId('produk_id')->references('id')->on('producks');
        });

        Schema::create('doc_pendukung', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_transaksi_id')->constrained('transaksi_data');
            $table->string('doc')->nullable();
            $table->string('link')->nullable();
            $table->string('catatan')->nullable();
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
        Schema::dropIfExists('produk_transaksi');
        Schema::dropIfExists('transaksi_data');
        Schema::dropIfExists('desain_produk_transaksi');
    }
};
