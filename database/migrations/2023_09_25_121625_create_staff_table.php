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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('foto_staff');
            $table->string('nama');
            $table->string('jabatan');
            $table->string('email');
            $table->string('telepon');
            $table->unsignedBigInteger('homestay_id');
            $table->timestamps();

            $table->foreign('homestay_id')->references('id')->on('homestay');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};