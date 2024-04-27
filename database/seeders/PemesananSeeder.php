<?php

namespace Database\Seeders;

use App\Models\Pemesanan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pemesanan::create([
            'homestay_id' => 1,
            'tamu_id' => 1,
            'room_id' => 1,
            'tanggal_checkin' => '2023-12-15',
            'tanggal_checkout' => '2023-12-17',
            'jumlah_tamu' => 2,
            'total_harga' => 400.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Pemesanan::create([
            'homestay_id' => 2,
            'tamu_id' => 2,
            'room_id' => 2,
            'tanggal_checkin' => '2023-12-20',
            'tanggal_checkout' => '2023-12-22',
            'jumlah_tamu' => 3,
            'total_harga' => 600.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Pemesanan::create([
            'homestay_id' => 3,
            'tamu_id' => 3,
            'room_id' => 3,
            'tanggal_checkin' => '2023-12-25',
            'tanggal_checkout' => '2023-12-27',
            'jumlah_tamu' => 4,
            'total_harga' => 800.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Pemesanan::create([
            'homestay_id' => 4,
            'tamu_id' => 4,
            'room_id' => 4,
            'tanggal_checkin' => '2023-12-30',
            'tanggal_checkout' => '2024-01-01',
            'jumlah_tamu' => 2,
            'total_harga' => 300.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Pemesanan::create([
            'homestay_id' => 5,
            'tamu_id' => 5,
            'room_id' => 5,
            'tanggal_checkin' => '2024-01-05',
            'tanggal_checkout' => '2024-01-08',
            'jumlah_tamu' => 6,
            'total_harga' => 900.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}