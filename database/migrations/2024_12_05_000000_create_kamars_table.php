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
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->string('no_kamar');
            $table->string('tipe_kamar', 1); // Tipe kamar hanya huruf 1 karakter (a-z)
            $table->integer('harga_per_bulan');
            $table->enum('status', ['tersedia', 'terisi'])->default('tersedia'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};
