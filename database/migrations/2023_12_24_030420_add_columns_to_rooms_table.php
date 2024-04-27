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
        Schema::table('rooms', function (Blueprint $table) {
            $table->unsignedBigInteger('main_image_id')->nullable(); // Kolom untuk foreign key
            $table->foreign('main_image_id')->references('id')->on('room_galleries'); // Relasi foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign(['main_image_id']); // Hapus foreign key
            $table->dropColumn('main_image_id'); // Hapus kolom
        });
    }
};
