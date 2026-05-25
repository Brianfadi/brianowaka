<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin user already exists
        $adminEmail = 'admin@brianowaka.com';
        
        if (User::where('email', $adminEmail)->exists()) {
            $this->command->info('Admin user already exists!');
            return;
        }

        // Create admin user
        User::create([
            'name' => 'Brian Owaka',
            'email' => $adminEmail,
            'password' => Hash::make('Admin@2026'), // Change this password!
            'email_verified_at' => now(),
        ]);

        $this->command->info('Admin user created successfully!');
        $this->command->info('Email: ' . $adminEmail);
        $this->command->info('Password: Admin@2026');
        $this->command->warn('⚠️  IMPORTANT: Change this password after first login!');
    }
}
