<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogCategory;
use Illuminate\Support\Str;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Tips & Tricks',
                'icon' => '💡',
                'color' => '#F59E0B',
                'description' => 'Tips dan trik seputar produk dan perawatan',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Berita Produk',
                'icon' => '📦',
                'color' => '#3B82F6',
                'description' => 'Update dan berita terbaru tentang produk kami',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Kesehatan & Kecantikan',
                'icon' => '✨',
                'color' => '#EC4899',
                'description' => 'Artikel seputar kesehatan dan kecantikan',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Lifestyle',
                'icon' => '🌟',
                'color' => '#8B5CF6',
                'description' => 'Gaya hidup sehat dan modern',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Tutorial',
                'icon' => '📚',
                'color' => '#10B981',
                'description' => 'Panduan lengkap penggunaan produk',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Company News',
                'icon' => '🏢',
                'color' => '#6366F1',
                'description' => 'Berita dan update dari perusahaan',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            BlogCategory::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'icon' => $category['icon'],
                'color' => $category['color'],
                'description' => $category['description'],
                'order' => $category['order'],
                'is_active' => $category['is_active'],
            ]);
        }

        $this->command->info('Blog categories seeded successfully!');
    }
}