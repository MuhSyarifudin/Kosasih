<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Region::create([
            'kota' => 'Jakarta',
            'provinsi' => 'DKI Jakarta',
        ]);

        Region::create([
            'kota' => 'Surabaya',
            'provinsi' => 'Jawa Timur',
        ]);

        Region::create([
            'kota' => 'Bandung',
            'provinsi' => 'Jawa Barat',
        ]);

        Region::create([
            'kota' => 'Melaya',
            'provinsi' => 'Bali',
        ]);

        Region::create([
            'kota' => 'Banyuwangi',
            'provinsi' => 'Jawa Timur ',
        ]);
    }
}
