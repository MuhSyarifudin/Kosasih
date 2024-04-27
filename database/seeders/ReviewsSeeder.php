<?php

namespace Database\Seeders;

use App\Models\Reviews;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reviews::create([
            'homestay_id' => 1,
            'tamu_id' => 1,
            'rating' => 4,
            'ulasan' => 'Great experience! The homestay was clean and cozy.',
            'gallery_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Reviews::create([
            'homestay_id' => 2,
            'tamu_id' => 2,
            'rating' => 5,
            'ulasan' => 'Amazing stay! Beautiful homestay with friendly hosts.',
            'gallery_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Reviews::create([
            'homestay_id' => 3,
            'tamu_id' => 3,
            'rating' => 3,
            'ulasan' => 'Decent place. Could use some improvements.',
            'gallery_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Reviews::create([
            'homestay_id' => 4,
            'tamu_id' => 4,
            'rating' => 4,
            'ulasan' => 'Lovely homestay. Enjoyed the comfortable atmosphere.',
            'gallery_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Reviews::create([
            'homestay_id' => 5,
            'tamu_id' => 5,
            'rating' => 5,
            'ulasan' => 'Exceptional stay! Would highly recommend.',
            'gallery_id' => '5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}