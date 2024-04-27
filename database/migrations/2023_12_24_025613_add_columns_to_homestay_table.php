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
        Schema::table('homestay', function (Blueprint $table) {
            $table->unsignedBigInteger('region_id')->nullable(); // Kolom untuk foreign key
            $table->foreign('region_id')->references('id')->on('region'); // Relasi foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homestay', function (Blueprint $table) {
            $table->dropForeign(['region_id']); // Hapus foreign key
            $table->dropColumn('region_id'); // Hapus kolom
        });
    }
};
