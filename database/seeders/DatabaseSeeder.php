<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user if it doesn't exist
        if (!\App\Models\User::where('email', 'admin@brianowaka.com')->exists()) {
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@brianowaka.com',
                'password' => bcrypt('Admin@2026'),
            ]);
        }
    }
}
