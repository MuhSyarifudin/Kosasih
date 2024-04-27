<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KetersediaanKamarHomestay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KetersediaanKamarHomestaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KetersediaanKamarHomestay::create([
            'room_id' => 1,
            'homestay_id' => 1,
            'tanggal' => '2023-12-15',
            'tersedia' => 'available',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        KetersediaanKamarHomestay::create([
            'room_id' => 2,
            'homestay_id' => 2,
            'tanggal' => '2023-12-16',
            'tersedia' => 'unavailable',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        KetersediaanKamarHomestay::create([
            'room_id' => 3,
            'homestay_id' => 3,
            'tanggal' => '2023-12-17',
            'tersedia' => 'available',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        KetersediaanKamarHomestay::create([
            'room_id' => 4,
            'homestay_id' => 4,
            'tanggal' => '2023-12-18',
            'tersedia' => 'unavailable',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        KetersediaanKamarHomestay::create([
            'room_id' => 5,
            'homestay_id' => 5,
            'tanggal' => '2023-12-19',
            'tersedia' => 'available',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
