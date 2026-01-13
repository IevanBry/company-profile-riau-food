<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomeContent;

class HomeContentSeeder extends Seeder
{
    public function run(): void
    {
        HomeContent::create([
            'hero_badge' => '✨ Importir & Distributor Terpercaya',
            'hero_title' => 'Distributor Produk Berkualitas Terpercaya',
            'hero_description' => 'PT. Riau Food Lestari adalah importir dan distributor berbagai produk kebutuhan sehari-hari berkualitas tinggi dari berbagai negara untuk seluruh Indonesia.',
            'hero_image' => 'https://images.unsplash.com/photo-1556228578-0d85b1a4d571?w=800',

            'stat_1_number' => '10+',
            'stat_1_text' => 'Tahun Pengalaman',
            'stat_2_number' => '50+',
            'stat_2_text' => 'Produk Pilihan',
            'stat_3_number' => '100%',
            'stat_3_text' => 'Produk Original',

            'about_title' => 'Importir & Distributor Terpercaya',
            'about_description_1' => 'PT. Riau Food Lestari adalah perusahaan importir dan distributor yang berlokasi di Pekanbaru, Riau. Kami fokus pada distribusi berbagai produk kebutuhan sehari-hari berkualitas tinggi dari berbagai supplier terpercaya.',
            'about_description_2' => 'Dengan pengalaman lebih dari 10 tahun dalam industri distribusi, kami melayani berbagai produk seperti personal care, minuman, makanan, dan kebutuhan rumah tangga lainnya ke seluruh Indonesia.',
            'about_image' => 'https://images.unsplash.com/photo-1587854692152-cbe660dbde88?w=800',

            'cta_title' => 'Tertarik Menjadi Mitra Kami?',
            'cta_description' => 'Hubungi kami sekarang untuk informasi harga, pemesanan, dan program kemitraan distribusi produk',
            'phone' => '+62 823-9001-7777',
            'email' => 'info@riaufoodlestari.com',
            'address' => 'Pekanbaru, Riau, Indonesia',
            'operational_hours' => 'Senin - Sabtu: 08.30 - 17.00 WIB',
            'instagram_url' => 'https://instagram.com/riaufoodlestari',
            'whatsapp_url' => 'https://wa.me/6282390017777',
        ]);

        $this->command->info('✅ Home content seeder completed!');
    }
}