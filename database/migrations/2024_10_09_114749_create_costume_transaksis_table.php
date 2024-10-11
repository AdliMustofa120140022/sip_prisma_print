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
        Schema::create('costume_transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->constrained('transaksis');
            $table->string('product_name'); // Nama Produk
            $table->foreignId('category_id')->references('id')->on('katagoris');
            $table->foreignId('sub_kategori_id')->references('id')->on('sub_katagoris');
            $table->string('theme')->nullable(); // Tema
            $table->float('length_cm'); // Ukuran Panjang (cm)
            $table->float('width_cm'); // Ukuran Lebar (cm)
            $table->float('height_gram')->nullable(); // Ukuran Tinggi (gram)
            $table->float('thickness_cm')->nullable(); // Ketebalan (cm)
            $table->integer('sheet_count')->nullable(); // Jumlah Lembar
            $table->string('material'); // Bahan
            $table->string('color'); // Warna
            $table->string('print_type'); // Jenis Cetakan
            $table->string('print_resolution')->nullable(); // Resolusi Cetakan
            $table->string('finishing'); // Finishing
            $table->string('ink_type'); // Tinta yang digunakan
            $table->integer('order_quantity'); // Jumlah Pesanan
            $table->string('unit'); // Satuan Pesanan
            $table->date('usage_deadline')->nullable(); // Waktu Penggunaan
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('note')->nullable();
            $table->integer('harga')->nullable(); // Harga
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costume_transaksis');
    }
};
