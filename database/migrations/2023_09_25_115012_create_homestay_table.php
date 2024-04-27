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
        Schema::create('homestay', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('alamat');
            $table->decimal('harga_per_malam', 10, 2);
            $table->string('gambar');
           // $table->unsignedBigInteger('region_id'); // Kolom untuk foreign key
            $table->timestamps();

            //$table->foreign('region_id')->references('id')->on('region'); // Relasi foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homestay');
    }
};