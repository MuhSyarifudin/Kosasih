<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(){
        $this->call([
            ContactSeeder::class,
            DeleteSeeder::class,
            EventsSeeder::class,
            FasilitasSeeder::class,
            GallerySeeder::class,
            GeneralSettingsSeeder::class,
            HomestaySeeder::class,
            InvoiceSeeder::class,
            KetersediaanHomestaySeeder::class,
            KetersediaanKamarHomestaySeeder::class,
            LayananTambahanSeeder::class,
            PemesananSeeder::class,
            RegionSeeder::class,
            ReviewGallerySeeder::class,
            ReviewsSeeder::class,
            RoomGallerySeeder::class,
            RoomsSeeder::class,
            SettingSeeder::class,
            StaffSeeder::class,
            TagsSeeder::class,
            TamuSeeder::class,
            UserSeeder::class
        ]);
    }
}
