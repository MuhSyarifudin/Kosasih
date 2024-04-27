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
        Schema::table('reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('gallery_id')->nullable(); // Kolom untuk foreign key
            $table->foreign('gallery_id')->references('id')->on('review_galleries'); // Relasi foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['gallery_id']); // Hapus foreign key
            $table->dropColumn('gallery_id'); // Hapus kolom
        });
    }
};