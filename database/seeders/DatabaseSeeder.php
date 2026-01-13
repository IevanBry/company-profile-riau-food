<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            HomeContentSeeder::class,
            BlogCategorySeeder::class,
            BlogPostSeeder::class,
             JobSeeder::class,
            // Tambahkan seeder lain di sini
            // ProductCategorySeeder::class,
            // ProductSeeder::class,
        ]);

        $this->command->info('Database seeding completed successfully!');
    }
}