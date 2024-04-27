<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tags::create([
            'nama_lokasi' => 'Beach Paradise',
            'jarak' => '300 meters',
            'homestay_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Tags::create([
            'nama_lokasi' => 'Mountain Retreat',
            'jarak' => '10 kilometers',
            'homestay_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Tags::create([
            'nama_lokasi' => 'City Vibes',
            'jarak' => '5 kilometers',
            'homestay_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Tags::create([
            'nama_lokasi' => 'Countryside Bliss',
            'jarak' => '20 kilometers',
            'homestay_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Tags::create([
            'nama_lokasi' => 'Historic Town',
            'jarak' => '2 kilometers',
            'homestay_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
