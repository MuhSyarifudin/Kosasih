<?php

namespace Database\Seeders;

use App\Models\Events;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Events::create([
            'homestay_id' => 1,
            'nama_event' => 'Sunset Beach Yoga',
            'tanggal_mulai' => '2023-12-10',
            'tanggal_selesai' => '2023-12-10',
            'gambar_event' => 'sunset_yoga.jpg',
            'deskripsi' => 'Join us for a relaxing yoga session on the beach at sunset!',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Events::create([
            'homestay_id' => 2,
            'nama_event' => 'Mountain Hiking Adventure',
            'tanggal_mulai' => '2023-12-15',
            'tanggal_selesai' => '2023-12-17',
            'gambar_event' => 'mountain_hiking.jpg',
            'deskripsi' => 'Embark on an exciting hiking adventure through the mountains.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Events::create([
            'homestay_id' => 3,
            'nama_event' => 'City Food Festival',
            'tanggal_mulai' => '2023-12-20',
            'tanggal_selesai' => '2023-12-22',
            'gambar_event' => 'food_festival.jpg',
            'deskripsi' => 'Experience the diverse flavors of the city in our food festival!',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Events::create([
            'homestay_id' => 4,
            'nama_event' => 'Countryside Retreat',
            'tanggal_mulai' => '2023-12-25',
            'tanggal_selesai' => '2023-12-26',
            'gambar_event' => 'countryside_retreat.jpg',
            'deskripsi' => 'Escape to the peaceful countryside for a short retreat.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Events::create([
            'homestay_id' => 5,
            'nama_event' => 'Historical Tour',
            'tanggal_mulai' => '2023-12-30',
            'tanggal_selesai' => '2024-01-02',
            'gambar_event' => 'historical_tour.jpg',
            'deskripsi' => 'Explore the rich history of the town with our historical tour.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}