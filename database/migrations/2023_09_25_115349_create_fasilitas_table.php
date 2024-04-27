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
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('gambar_fasilitas');
            $table->string('nama_fasilitas');
            $table->integer('jumlah');
            $table->text('deskripsi');
            $table->unsignedBigInteger('homestay_id');
            //$table->unsignedBigInteger('room_id')->nullable(); // Tambahkan kolom room_id
            $table->timestamps();

            $table->foreign('homestay_id')->references('id')->on('homestay');
            //$table->foreign('room_id')->references('id')->on('rooms')->nullable(); // Relasikan dengan tabel rooms
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas');
    }
};