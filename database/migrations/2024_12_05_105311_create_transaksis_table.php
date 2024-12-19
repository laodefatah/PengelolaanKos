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
            $table->unsignedBigInteger('kamar_id');
            $table->unsignedBigInteger('penghuni_id');
            $table->decimal('jumlah_pembayaran', 10, 2);
            $table->string('status_pembayaran')->default('Belum Lunas');
            $table->date('tanggal_transaksi');
            $table->timestamps();

            // Foreign keys dengan indeks
            $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('cascade');
            $table->foreign('penghuni_id')->references('id')->on('penghunis')->onDelete('cascade');

            $table->index(['kamar_id', 'penghuni_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
