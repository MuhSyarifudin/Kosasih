<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'subject' => 'Inquiry about services',
            'message' => 'I am interested in your services. Can you provide more information?',
            'tamu_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Contact::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'subject' => 'Feedback',
            'message' => 'I wanted to give feedback on your services. Overall, it was great!',
            'tamu_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}