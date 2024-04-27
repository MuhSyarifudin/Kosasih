<?php

namespace Database\Seeders;

use App\Models\Homestay;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HomestaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Homestay::create([
            'nama' => 'Cozy Cottage',
            'deskripsi' => 'A charming cottage for a relaxing getaway.',
            'alamat' => '123 Main Street, Anytown',
            'harga_per_malam' => 150.00,
            'gambar' => 'cozy_cottage.jpg',
            'region_id' => 1, // Sesuaikan dengan ID region yang sesuai
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Homestay::create([
            'nama' => 'Luxury Villa',
            'deskripsi' => 'Experience luxury in this exquisite villa.',
            'alamat' => '456 Elite Avenue, Luxville',
            'harga_per_malam' => 500.00,
            'gambar' => 'luxury_villa.jpg',
            'region_id' => 2, // Sesuaikan dengan ID region yang sesuai
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Homestay::create([
            'nama' => 'Beachfront Bungalow',
            'deskripsi' => 'Enjoy the sound of waves in this beachfront bungalow.',
            'alamat' => '789 Ocean Drive, Beach City',
            'harga_per_malam' => 250.00,
            'gambar' => 'beachfront_bungalow.jpg',
            'region_id' => 3, // Sesuaikan dengan ID region yang sesuai
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Homestay::create([
            'nama' => 'Mountain Retreat',
            'deskripsi' => 'Escape to the tranquility of the mountains.',
            'alamat' => '101 Serenity Trail, Mountain Valley',
            'harga_per_malam' => 180.00,
            'gambar' => 'mountain_retreat.jpg',
            'region_id' => 4, // Sesuaikan dengan ID region yang sesuai
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Homestay::create([
            'nama' => 'Urban Loft',
            'deskripsi' => 'Modern loft in the heart of the city.',
            'alamat' => '555 Urban Avenue, Metro City',
            'harga_per_malam' => 300.00,
            'gambar' => 'urban_loft.jpg',
            'region_id' => 5, // Sesuaikan dengan ID region yang sesuai
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}