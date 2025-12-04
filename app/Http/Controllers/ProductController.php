<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Data kategori produk
        $categories = [
            [
                'id' => 'kusuka',
                'name' => 'Kusuka Body Shampoo',
                'slug' => 'kusuka',
                'description' => 'Body shampoo premium dari Malaysia',
                'badge' => 'Best Seller',
                'badge_icon' => 'fire',
                'badge_color' => 'from-orange-500 to-red-600',
                'origin' => '🇲🇾 Malaysia',
                'featured' => true
            ],
            [
                'id' => 'dettol',
                'name' => 'Dettol',
                'slug' => 'dettol',
                'description' => 'Produk kesehatan dan kebersihan terpercaya',
                'badge' => 'Trusted',
                'badge_icon' => 'shield-alt',
                'badge_color' => 'from-blue-500 to-blue-700',
                'origin' => '🇬🇧 UK',
                'featured' => true
            ],
            [
                'id' => 'lifebuoy',
                'name' => 'Lifebuoy',
                'slug' => 'lifebuoy',
                'description' => 'Perlindungan kesehatan keluarga',
                'badge' => 'Popular',
                'badge_icon' => 'heart',
                'badge_color' => 'from-red-500 to-pink-600',
                'origin' => '🌍 Global',
                'featured' => true
            ],
            [
                'id' => 'pepsodent',
                'name' => 'Pepsodent',
                'slug' => 'pepsodent',
                'description' => 'Perawatan gigi dan mulut',
                'badge' => 'Quality',
                'badge_icon' => 'star',
                'badge_color' => 'from-blue-400 to-blue-600',
                'origin' => '🌏 Indonesia',
                'featured' => false
            ]
        ];

        // Data produk per kategori
        $products = [
            'kusuka' => [
                [
                    'name' => 'Kusuka Rose',
                    'description' => 'Body shampoo dengan ekstrak mawar yang memberikan aroma elegan dan menyegarkan untuk kulit Anda.',
                    'sizes' => ['1000ML', '2000ML'],
                    'rating' => 4.9,
                    'gradient' => 'from-pink-200 via-pink-300 to-pink-400',
                    'icon' => 'spa',
                    'badge' => 'Best Seller',
                    'badge_color' => 'from-orange-500 to-red-600'
                ],
                [
                    'name' => 'Kusuka Goats Milk',
                    'description' => 'Diperkaya dengan susu kambing untuk menutrisi dan melembabkan kulit menjadi lebih halus dan lembut.',
                    'sizes' => ['1000ML', '2000ML'],
                    'rating' => 4.8,
                    'gradient' => 'from-amber-200 via-amber-300 to-orange-300',
                    'icon' => 'droplet',
                    'badge' => null,
                    'badge_color' => null
                ],
                [
                    'name' => 'Kusuka Pomelo',
                    'description' => 'Aroma pomelo yang segar dan citrus memberikan kesegaran maksimal sepanjang hari untuk aktivitas Anda.',
                    'sizes' => ['1000ML', '2000ML'],
                    'rating' => 4.7,
                    'gradient' => 'from-green-200 via-green-300 to-teal-300',
                    'icon' => 'lemon',
                    'badge' => 'Fresh',
                    'badge_color' => 'bg-green-500'
                ],
                [
                    'name' => 'Kusuka Royal Jelly',
                    'description' => 'Mengandung royal jelly untuk memberikan nutrisi premium dan perawatan ekstra untuk kulit Anda.',
                    'sizes' => ['1000ML'],
                    'rating' => 5.0,
                    'gradient' => 'from-yellow-200 via-yellow-300 to-amber-300',
                    'icon' => 'gem',
                    'badge' => 'Premium',
                    'badge_color' => 'bg-yellow-500'
                ]
            ],
            'dettol' => [
                [
                    'name' => 'Dettol Antiseptic Liquid',
                    'description' => 'Cairan antiseptik untuk melindungi keluarga dari kuman dan bakteri.',
                    'sizes' => ['250ML', '500ML', '1L'],
                    'rating' => 4.9,
                    'gradient' => 'from-green-300 via-teal-400 to-teal-500',
                    'icon' => 'shield-virus',
                    'badge' => 'Medical Grade',
                    'badge_color' => 'bg-green-600'
                ],
                [
                    'name' => 'Dettol Hand Sanitizer',
                    'description' => 'Hand sanitizer dengan perlindungan maksimal dari kuman, praktis dibawa kemana-mana.',
                    'sizes' => ['50ML', '100ML', '200ML'],
                    'rating' => 4.8,
                    'gradient' => 'from-blue-300 via-blue-400 to-blue-500',
                    'icon' => 'hand-sparkles',
                    'badge' => 'Portable',
                    'badge_color' => 'bg-blue-600'
                ],
                [
                    'name' => 'Dettol Body Wash',
                    'description' => 'Sabun mandi dengan perlindungan antibakteri untuk kulit bersih dan sehat.',
                    'sizes' => ['250ML', '450ML'],
                    'rating' => 4.7,
                    'gradient' => 'from-indigo-300 via-indigo-400 to-purple-500',
                    'icon' => 'pump-soap',
                    'badge' => 'Antibacterial',
                    'badge_color' => 'bg-indigo-600'
                ]
            ],
            'lifebuoy' => [
                [
                    'name' => 'Lifebuoy Total 10',
                    'description' => 'Perlindungan dari 10 masalah kulit dengan formula advanced.',
                    'sizes' => ['85g', '110g'],
                    'rating' => 4.8,
                    'gradient' => 'from-red-300 via-red-400 to-red-500',
                    'icon' => 'shield-check',
                    'badge' => 'Total Protection',
                    'badge_color' => 'bg-red-600'
                ],
                [
                    'name' => 'Lifebuoy Nature',
                    'description' => 'Dengan bahan alami untuk melindungi dan merawat kulit.',
                    'sizes' => ['85g', '110g'],
                    'rating' => 4.7,
                    'gradient' => 'from-green-300 via-green-400 to-green-500',
                    'icon' => 'leaf',
                    'badge' => 'Natural',
                    'badge_color' => 'bg-green-600'
                ]
            ],
            'pepsodent' => [
                [
                    'name' => 'Pepsodent Whitening',
                    'description' => 'Pasta gigi untuk gigi putih berseri dalam 2 minggu.',
                    'sizes' => ['75g', '120g', '190g'],
                    'rating' => 4.6,
                    'gradient' => 'from-blue-200 via-blue-300 to-blue-400',
                    'icon' => 'tooth',
                    'badge' => 'Whitening',
                    'badge_color' => 'bg-blue-500'
                ],
                [
                    'name' => 'Pepsodent Sensitive Expert',
                    'description' => 'Perawatan khusus untuk gigi sensitif.',
                    'sizes' => ['100g', '160g'],
                    'rating' => 4.7,
                    'gradient' => 'from-purple-200 via-purple-300 to-purple-400',
                    'icon' => 'heart-pulse',
                    'badge' => 'Sensitive Care',
                    'badge_color' => 'bg-purple-500'
                ]
            ]
        ];

        return view('products', compact('categories', 'products'));
    }

    public function show($slug)
    {
        return view('products.show', compact('slug'));
    }
}