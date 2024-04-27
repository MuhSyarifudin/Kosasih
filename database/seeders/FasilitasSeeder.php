<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fasilitas::create([
            'gambar_fasilitas' => 'fa-wifi.jpg',
            'nama_fasilitas' => 'Free Wi-Fi',
            'jumlah' => 10,
            'deskripsi' => 'High-speed internet available in all areas.',
            'homestay_id' => 1, // Adjust the homestay_id based on your actual homestay data
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Fasilitas::create([
            'gambar_fasilitas' => 'fa-swimming-pool.jpg',
            'nama_fasilitas' => 'Swimming Pool',
            'jumlah' => 1,
            'deskripsi' => 'Outdoor pool with a relaxing environment.',
            'homestay_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        Fasilitas::create([
            'gambar_fasilitas' => 'fa-parking.jpg',
            'nama_fasilitas' => 'Parking Area',
            'jumlah' => 20,
            'deskripsi' => 'Secure parking available for guests.',
            'homestay_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        Fasilitas::create([
            'gambar_fasilitas' => 'fa-coffee.jpg',
            'nama_fasilitas' => 'Coffee Shop',
            'jumlah' => 1,
            'deskripsi' => 'On-site coffee shop serving fresh brews.',
            'homestay_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        Fasilitas::create([
            'gambar_fasilitas' => 'fa-bicycle.jpg',
            'nama_fasilitas' => 'Bicycle Rental',
            'jumlah' => 5,
            'deskripsi' => 'Explore the surroundings with our bicycle rental service.',
            'homestay_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
