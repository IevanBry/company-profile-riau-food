<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@riaufoodlestari.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'phone' => '0761-123456',
            'address' => 'Pekanbaru, Riau',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $this->command->info('✅ Admin user created successfully!');
        $this->command->info('📧 Email: admin@riaufoodlestari.com');
        $this->command->info('🔑 Password: admin123');
    }
}