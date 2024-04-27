<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'phone' => '081234567800',
            'whatsapp' => '081324576890',
            'email' => 'azhomestay1@gmail.com',
            'instagram' => 'InstagramUsername',
            'twitter' => 'TwitterUsername',
            'facebook' => 'FacebookUsername',
            'location' => 'Street Andalas, East Java',
            'google_maps_url' => 'https://maps.app.goo.gl/2vY8R8qupjjtDnKQ6',
            // Tambahkan data lain sesuai kebutuhan
        ]);
    }
}
