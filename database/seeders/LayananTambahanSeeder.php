<?php

namespace Database\Seeders;

use App\Models\LayananTambahan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LayananTambahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LayananTambahan::create([
            'nama' => 'Spa Package',
            'deskripsi' => 'Indulge in a relaxing spa experience during your stay.',
            'harga' => 50.00,
            'homestay_id' => 1,
            'room_id' => 1,
            'tamu_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        LayananTambahan::create([
            'nama' => 'Adventure Tour',
            'deskripsi' => 'Embark on an exciting adventure tour exploring nearby attractions.',
            'harga' => 75.00,
            'homestay_id' => 2,
            'room_id' => 2,
            'tamu_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        LayananTambahan::create([
            'nama' => 'Gourmet Dining',
            'deskripsi' => 'Enjoy gourmet dining experiences with a curated menu.',
            'harga' => 30.00,
            'homestay_id' => 3,
            'room_id' => 3,
            'tamu_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        LayananTambahan::create([
            'nama' => 'Private Beach Access',
            'deskripsi' => 'Experience exclusive access to a private beach area.',
            'harga' => 40.00,
            'homestay_id' => 4,
            'room_id' => 4,
            'tamu_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        LayananTambahan::create([
            'nama' => 'Cultural Workshop',
            'deskripsi' => 'Immerse yourself in local culture with our interactive cultural workshop.',
            'harga' => 25.00,
            'homestay_id' => 5,
            'room_id' => 5,
            'tamu_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}