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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('homestay_id');
            $table->unsignedBigInteger('tamu_id');
            $table->integer('rating');
            //$table->unsignedBigInteger('gallery_id')->nullable(); // Menambahkan kolom gallery_id
            $table->text('ulasan');
            $table->timestamps();

            $table->foreign('homestay_id')->references('id')->on('homestay');
            $table->foreign('tamu_id')->references('id')->on('tamu');
            //$table->foreign('gallery_id')->references('id')->on('review_galleries')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
