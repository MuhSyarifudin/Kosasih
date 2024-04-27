<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Staff::create([
            'nama' => 'John Doe',
            'jabatan' => 'Manager',
            'email' => 'john.manager@example.com',
            'telepon' => '+1 123-456-7890',
            'foto_staff' => 'john_doe_photo.jpg',
            'homestay_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Staff::create([
            'nama' => 'Jane Smith',
            'jabatan' => 'Front Desk Officer',
            'email' => 'jane.frontdesk@example.com',
            'telepon' => '+1 987-654-3210',
            'foto_staff' => 'john_doe_photo.jpg',
            'homestay_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Staff::create([
            'nama' => 'Mike Johnson',
            'jabatan' => 'Chef',
            'email' => 'mike.chef@example.com',
            'telepon' => '+1 567-890-1234',
            'foto_staff' => 'john_doe_photo.jpg',
            'homestay_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        Staff::create([
            'nama' => 'Emily Davis',
            'jabatan' => 'Housekeeping',
            'email' => 'emily.housekeeping@example.com',
            'telepon' => '+1 234-567-8901',
            'foto_staff' => 'john_doe_photo.jpg',
            'homestay_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        Staff::create([
            'nama' => 'Alex Turner',
            'jabatan' => 'Security Guard',
            'email' => 'alex.security@example.com',
            'telepon' => '+1 876-543-2109',
            'foto_staff' => 'john_doe_photo.jpg',
            'homestay_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}