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
        // Create admin user directly without factory
        if (!\App\Models\User::where('email', 'admin@brianowaka.com')->exists()) {
            \App\Models\User::create([
                'name' => 'Admin',
                'email' => 'admin@brianowaka.com',
                'password' => \Illuminate\Support\Facades\Hash::make('Admin@2026'),
                'email_verified_at' => now(),
            ]);
            
            $this->command->info('✓ Admin user created successfully!');
        } else {
            $this->command->info('✓ Admin user already exists.');
        }
    }
}
