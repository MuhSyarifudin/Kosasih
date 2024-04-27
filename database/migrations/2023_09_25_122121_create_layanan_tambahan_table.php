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
        Schema::create('layanan_tambahan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->decimal('harga', 10, 2);
            $table->unsignedBigInteger('homestay_id');
            $table->unsignedBigInteger('room_id')->nullable(); // Tambahkan kolom room_id
            $table->unsignedBigInteger('tamu_id')->nullable(); // Tambahkan kolom tamu_id
            $table->timestamps();

            $table->foreign('homestay_id')->references('id')->on('homestay');
            $table->foreign('room_id')->references('id')->on('rooms')->nullable(); // Relasikan dengan tabel rooms
            $table->foreign('tamu_id')->references('id')->on('tamu')->nullable(); // Relasikan dengan tabel tamu
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_tambahan');
    }
};
