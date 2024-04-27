<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Invoice::create([
            'pemesanan_id' => 1,
            'tamu_id' => 1, // Adjust the tamu_id based on your actual tamu data
            'layanan_tambahan_id' => 1, // Adjust the layanan_tambahan_id based on your actual layanan_tambahan data
            'tanggal' => '2023-12-15',
            'total_harga' => 120.00,
            'status_pembayaran' => 'Paid',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Invoice::create([
            'pemesanan_id' => 2,
            'tamu_id' => 2, // Adjust the tamu_id based on your actual tamu data
            'layanan_tambahan_id' => 2, // Adjust the layanan_tambahan_id based on your actual layanan_tambahan data
            'tanggal' => '2023-12-20',
            'total_harga' => 200.00,
            'status_pembayaran' => 'Pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Invoice::create([
            'pemesanan_id' => 3,
            'tamu_id' => 3, // Adjust the tamu_id based on your actual tamu data
            'layanan_tambahan_id' => 3, // Adjust the layanan_tambahan_id based on your actual layanan_tambahan data
            'tanggal' => '2023-12-25',
            'total_harga' => 150.00,
            'status_pembayaran' => 'Paid',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Invoice::create([
            'pemesanan_id' => 4,
            'tamu_id' => 4, // Adjust the tamu_id based on your actual tamu data
            'layanan_tambahan_id' => 4, // Adjust the layanan_tambahan_id based on your actual layanan_tambahan data
            'tanggal' => '2023-12-30',
            'total_harga' => 180.00,
            'status_pembayaran' => 'Pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Invoice::create([
            'pemesanan_id' => 5,
            'tamu_id' => 5, // Adjust the tamu_id based on your actual tamu data
            'layanan_tambahan_id' => 5, // Adjust the layanan_tambahan_id based on your actual layanan_tambahan data
            'tanggal' => '2024-01-05',
            'total_harga' => 250.00,
            'status_pembayaran' => 'Paid',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}