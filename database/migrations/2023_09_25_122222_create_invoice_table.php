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
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemesanan_id');
            $table->unsignedBigInteger('tamu_id'); // Tambahkan kolom tamu_id
            $table->unsignedBigInteger('layanan_tambahan_id'); // Tambahkan kolom layanan_tambahan_id
            $table->date('tanggal');
            $table->decimal('total_harga', 10, 2);
            $table->string('status_pembayaran');
            $table->timestamps();

            $table->foreign('pemesanan_id')->references('id')->on('pemesanan');
            $table->foreign('tamu_id')->references('id')->on('tamu'); // Relasi foreign key tamu_id
            $table->foreign('layanan_tambahan_id')->references('id')->on('layanan_tambahan'); // Relasi foreign key layanan_tambahan_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};
