<?php

namespace Database\Seeders;

use App\Models\Tamu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tamu::create([
            'nama_tamu' => 'John Doe',
            'email_tamu' => 'john.doe@example.com',
            'password_tamu' => Hash::make('password123'),
            'file_tamu' => 'john_doe_profile.jpg',
            'foto_tamu' => 'john_doe_profile.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Tamu::create([
            'nama_tamu' => 'Jane Smith',
            'email_tamu' => 'jane.smith@example.com',
            'password_tamu' => Hash::make('pass456'),
            'file_tamu' => 'jane_smith_profile.jpg',
            'foto_tamu' => 'john_doe_profile.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Tamu::create([
            'nama_tamu' => 'Alice Johnson',
            'email_tamu' => 'alice.j@example.com',
            'password_tamu' => Hash::make('securepass'),
            'file_tamu' => 'alice_j_profile.jpg',
            'foto_tamu' => 'john_doe_profile.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Tamu::create([
            'nama_tamu' => 'Bob Brown',
            'email_tamu' => 'bob.b@example.com',
            'password_tamu' => Hash::make('secretword'),
            'file_tamu' => 'bob_brown_profile.jpg',
            'foto_tamu' => 'john_doe_profile.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Tamu::create([
            'nama_tamu' => 'Eva Williams',
            'email_tamu' => 'eva.w@example.com',
            'password_tamu' => Hash::make('evapass'),
            'file_tamu' => 'eva_w_profile.jpg',
            'foto_tamu' => 'john_doe_profile.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}