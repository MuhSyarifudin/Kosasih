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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('homestay_id');
            $table->unsignedBigInteger('fasilitas_id');
            $table->string('nama');
            $table->integer('kapasitas');
            $table->decimal('harga_per_malam', 10, 2);
            $table->text('deskripsi');
            $table->timestamps();

            $table->foreign('homestay_id')->references('id')->on('homestay');
            $table->foreign('fasilitas_id')->references('id')->on('fasilitas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
