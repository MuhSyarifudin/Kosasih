<?php

namespace Database\Seeders;

use App\Models\Rooms;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rooms::create([
            'homestay_id' => 1, // Adjust the homestay_id based on your actual homestay data
            'nama' => 'Deluxe Suite',
            'kapasitas' => 2,
            'harga_per_malam' => 200.00,
            'deskripsi' => 'Spacious suite with modern amenities.',
            'fasilitas_id' => 1, // Adjust the fasilitas_id based on your actual fasilitas_id data
            'main_image_id' => 1, // Adjust the main_image_id based on your actual main_image_id data
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Rooms::create([
            'homestay_id' => 2,
            'nama' => 'Ocean View Room',
            'kapasitas' => 3,
            'harga_per_malam' => 300.00,
            'deskripsi' => 'Enjoy breathtaking views of the ocean.',
            'fasilitas_id' => 2,// Adjust the fasilitas_id based on your actual fasilitas_id data
            'main_image_id' => 2,// Adjust the main_image_id based on your actual main_image_id data
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Rooms::create([
            'homestay_id' => 3,
            'nama' => 'Cozy Cabin',
            'kapasitas' => 4,
            'harga_per_malam' => 150.00,
            'deskripsi' => 'Rustic cabin nestled in the mountains.',
            'fasilitas_id' => 3, // Adjust the fasilitas_id based on your actual fasilitas_id data
            'main_image_id' => 3, // Adjust the main_image_id based on your actual main_image_id data
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Rooms::create([
            'homestay_id' => 4,
            'nama' => 'Cityscape Loft',
            'kapasitas' => 2,
            'harga_per_malam' => 250.00,
            'deskripsi' => 'Loft with stunning views of the city skyline.',
            'fasilitas_id' => 4, // Adjust the fasilitas_id based on your actual fasilitas_id data
            'main_image_id' => 4, // Adjust the main_image_id based on your actual main_image_id data
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Rooms::create([
            'homestay_id' => 5,
            'nama' => 'Family Suite',
            'kapasitas' => 6,
            'harga_per_malam' => 400.00,
            'deskripsi' => 'Ideal for families with spacious living areas.',
            'fasilitas_id' => 5, // Adjust the fasilitas_id based on your actual fasilitas_id data
            'main_image_id' => 5, // Adjust the main_image_id based on your actual main_image_id data
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
