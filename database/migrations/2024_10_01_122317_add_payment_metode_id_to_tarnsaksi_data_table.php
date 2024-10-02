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
        Schema::table('transaksi_data', function (Blueprint $table) {
            $table->foreignId('payment_metode_id')->constrained('payment_metodes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi_data', function (Blueprint $table) {
            $table->dropForeign(['payment_metode_id']);
            $table->dropColumn('payment_metode_id');
        });
    }
};
