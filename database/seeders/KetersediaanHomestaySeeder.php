<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KetersediaanHomestay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KetersediaanHomestaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KetersediaanHomestay::create([
            'homestay_id' => 1,
            'tanggal' => '2023-12-15',
            'tersedia' => 'available',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        KetersediaanHomestay::create([
            'homestay_id' => 2,
            'tanggal' => '2023-12-16',
            'tersedia' => 'unavailable',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        KetersediaanHomestay::create([
            'homestay_id' => 4,
            'tanggal' => '2023-12-18',
            'tersedia' => 'unavailable',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        KetersediaanHomestay::create([
            'homestay_id' => 5,
            'tanggal' => '2023-12-19',
            'tersedia' => 'available',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        KetersediaanHomestay::create([
            'homestay_id' => 5,
            'tanggal' => '2023-12-19',
            'tersedia' => 'available',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
