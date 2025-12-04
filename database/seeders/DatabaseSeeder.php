<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed Company Settings
        Setting::firstOrCreate(
            ['key' => 'company_name'],
            [
                'value' => 'PT. Riau Food Lestari',
                'type' => 'text',
                'group' => 'company',
                'label' => 'Nama Perusahaan',
                'description' => 'Nama resmi perusahaan'
            ]
        );

        Setting::firstOrCreate(
            ['key' => 'company_address'],
            [
                'value' => 'Jl. Soekarno Hatta, Pekanbaru, Riau 28111, Indonesia',
                'type' => 'text',
                'group' => 'company',
                'label' => 'Alamat Perusahaan',
                'description' => 'Alamat lengkap kantor pusat perusahaan'
            ]
        );

        Setting::firstOrCreate(
            ['key' => 'company_phone'],
            [
                'value' => '+62 823-9001-7777',
                'type' => 'text',
                'group' => 'company',
                'label' => 'Nomor Telepon',
                'description' => 'Nomor telepon/WhatsApp perusahaan'
            ]
        );

        Setting::firstOrCreate(
            ['key' => 'company_email'],
            [
                'value' => 'info@riaufoodlestari.com',
                'type' => 'text',
                'group' => 'company',
                'label' => 'Email Perusahaan',
                'description' => 'Email resmi perusahaan'
            ]
        );

        Setting::firstOrCreate(
            ['key' => 'company_maps_url'],
            [
                'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.4891!2d101.4384!3d0.5036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d58da1c1c1c1c1%3A0x1c1c1c1c1c1c1c1c!2sJl.%20Soekarno%20Hatta%2C%20Pekanbaru%2C%20Riau!5e0!3m2!1sid!2sid!4v1702684800000',
                'type' => 'text',
                'group' => 'company',
                'label' => 'URL Google Maps',
                'description' => 'Embed URL Google Maps untuk lokasi perusahaan'
            ]
        );
    }
}
