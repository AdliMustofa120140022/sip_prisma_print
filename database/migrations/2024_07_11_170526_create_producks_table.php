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
        Schema::create('producks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->foreignId('sub_kategori_id')->references('id')->on('sub_katagoris');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producks');
    }
};
