<?php

namespace Database\Seeders;

use App\Models\RoomGallery;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoomGallery::create([
            'main_image' => 'gallery_image_1.jpg',
            'homestay_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        RoomGallery::create([
            'main_image' => 'gallery_image_2.jpg',
            'homestay_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        RoomGallery::create([
            'main_image' => 'gallery_image_3.jpg',
            'homestay_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        RoomGallery::create([
            'main_image' => 'gallery_image_4.jpg',
            'homestay_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        RoomGallery::create([
            'main_image' => 'gallery_image_5.jpg',
            'homestay_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}