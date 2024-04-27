<?php

namespace Database\Seeders;

use App\Models\ReviewGallery;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReviewGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReviewGallery::create([
            'image_path' => 'review_image_1.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ReviewGallery::create([
            'image_path' => 'review_image_2.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ReviewGallery::create([
            'image_path' => 'review_image_3.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ReviewGallery::create([
            'image_path' => 'review_image_4.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ReviewGallery::create([
            'image_path' => 'review_image_5.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
