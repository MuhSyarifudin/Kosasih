<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gallery::create([
            'homestay_id' => 1, // Sesuaikan dengan homestay yang ingin Anda hubungkan
            'nama' => 'Kamar Tidur',
            'url' => 'https://example.com/images/kamar-tidur.jpg'
        ]);

        Gallery::create([
            'homestay_id' => 1, // Sesuaikan dengan homestay yang ingin Anda hubungkan
            'nama' => 'Ruang Makan',
            'url' => 'https://example.com/images/ruang-makan.jpg'
        ]);

        Gallery::create([
            'homestay_id' => 2, // Sesuaikan dengan homestay yang ingin Anda hubungkan
            'nama' => 'Pemandangan Gunung',
            'url' => 'https://example.com/images/pemandangan-gunung.jpg'
        ]);
    }
}