<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    private function getAllArticles()
    {
        return [
            [
                'id' => 1,
                'title' => 'Tips Memilih Body Shampoo yang Tepat untuk Kulit Anda',
                'slug' => 'tips-memilih-body-shampoo',
                'excerpt' => 'Panduan lengkap memilih body shampoo sesuai dengan jenis kulit Anda untuk hasil maksimal. Temukan rahasia mendapatkan kulit sehat dan terawat.',
                'image' => 'https://images.unsplash.com/photo-1556228578-0d85b1a4d571?w=800',
                'category' => 'Tips & Tricks',
                'date' => '2024-12-01',
                'author' => 'Tim Riau Food Lestari',
                'reading_time' => '5 min read',
                'views' => 1234
            ],
            [
                'id' => 2,
                'title' => 'Manfaat Royal Jelly untuk Kesehatan Kulit',
                'slug' => 'manfaat-royal-jelly-untuk-kulit',
                'excerpt' => 'Kenali lebih dalam manfaat royal jelly dan mengapa bahan ini sangat baik untuk perawatan kulit. Rahasia kecantikan alami dari alam.',
                'image' => 'https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?w=800',
                'category' => 'Kesehatan',
                'date' => '2024-11-28',
                'author' => 'Dr. Skin Care',
                'reading_time' => '7 min read',
                'views' => 2156
            ],
            [
                'id' => 3,
                'title' => 'Perbedaan Produk Import vs Lokal: Mana yang Lebih Baik?',
                'slug' => 'produk-import-vs-lokal',
                'excerpt' => 'Analisis mendalam tentang kelebihan dan kekurangan produk import dan lokal. Panduan memilih produk terbaik untuk kebutuhan Anda.',
                'image' => 'https://images.unsplash.com/photo-1556228720-195a672e8a03?w=800',
                'category' => 'Bisnis',
                'date' => '2024-11-25',
                'author' => 'Tim Riau Food Lestari',
                'reading_time' => '6 min read',
                'views' => 1876
            ],
            [
                'id' => 4,
                'title' => '5 Kebiasaan Perawatan Kulit yang Harus Anda Lakukan Setiap Hari',
                'slug' => '5-kebiasaan-perawatan-kulit-harian',
                'excerpt' => 'Rutinitas sederhana namun efektif untuk menjaga kesehatan kulit Anda setiap hari. Dapatkan kulit glowing dengan langkah mudah.',
                'image' => 'https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?w=800',
                'category' => 'Tips & Tricks',
                'date' => '2024-11-22',
                'author' => 'Beauty Expert',
                'reading_time' => '4 min read',
                'views' => 3421
            ],
            [
                'id' => 5,
                'title' => 'Kusuka Body Shampoo: Review Lengkap Semua Varian',
                'slug' => 'kusuka-body-shampoo-review-lengkap',
                'excerpt' => 'Review detail dari semua varian Kusuka Body Shampoo. Temukan varian yang paling sesuai dengan kebutuhan kulit Anda.',
                'image' => 'https://images.unsplash.com/photo-1556229010-aa4673a0c497?w=800',
                'category' => 'Produk',
                'date' => '2024-11-20',
                'author' => 'Product Review Team',
                'reading_time' => '8 min read',
                'views' => 5632
            ],
            [
                'id' => 6,
                'title' => 'Cara Membangun Bisnis Distribusi yang Sukses',
                'slug' => 'cara-membangun-bisnis-distribusi',
                'excerpt' => 'Tips dan strategi untuk memulai dan mengembangkan bisnis distribusi yang menguntungkan. Pelajari dari pengalaman 10+ tahun kami.',
                'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=800',
                'category' => 'Bisnis',
                'date' => '2024-11-18',
                'author' => 'Business Coach',
                'reading_time' => '10 min read',
                'views' => 2894
            ],
            [
                'id' => 7,
                'title' => 'Pentingnya pH Balance dalam Produk Perawatan Kulit',
                'slug' => 'pentingnya-ph-balance-perawatan-kulit',
                'excerpt' => 'Memahami pentingnya pH balance dan bagaimana memilih produk yang tepat untuk menjaga kesehatan kulit Anda.',
                'image' => 'https://images.unsplash.com/photo-1570554886111-e80fcca6a029?w=800',
                'category' => 'Kesehatan',
                'date' => '2024-11-15',
                'author' => 'Dr. Skin Care',
                'reading_time' => '6 min read',
                'views' => 1745
            ],
            [
                'id' => 8,
                'title' => 'Tren Produk Personal Care 2024: Apa yang Perlu Anda Ketahui',
                'slug' => 'tren-produk-personal-care-2024',
                'excerpt' => 'Eksplorasi tren terbaru dalam industri personal care dan bagaimana ini mempengaruhi pilihan konsumen modern.',
                'image' => 'https://images.unsplash.com/photo-1556228578-dd6a8b0e0fad?w=800',
                'category' => 'Produk',
                'date' => '2024-11-12',
                'author' => 'Industry Analyst',
                'reading_time' => '7 min read',
                'views' => 2103
            ],
            [
                'id' => 9,
                'title' => 'Rahasia Kulit Sehat: Hidrasi dari Dalam dan Luar',
                'slug' => 'rahasia-kulit-sehat-hidrasi',
                'excerpt' => 'Panduan komprehensif tentang pentingnya hidrasi untuk kesehatan kulit dan cara mencapainya dengan benar.',
                'image' => 'https://images.unsplash.com/photo-1487412947147-5cebf100ffc2?w=800',
                'category' => 'Kesehatan',
                'date' => '2024-11-10',
                'author' => 'Health & Wellness Expert',
                'reading_time' => '5 min read',
                'views' => 1589
            ],
            [
                'id' => 10,
                'title' => 'Mengenal Lebih Dekat Bahan Alami dalam Personal Care',
                'slug' => 'mengenal-bahan-alami-personal-care',
                'excerpt' => 'Pelajari tentang berbagai bahan alami yang sering digunakan dalam produk perawatan tubuh dan manfaatnya.',
                'image' => 'https://images.unsplash.com/photo-1596755389378-c31d21fd1273?w=800',
                'category' => 'Tips & Tricks',
                'date' => '2024-11-08',
                'author' => 'Natural Beauty Expert',
                'reading_time' => '6 min read',
                'views' => 1923
            ],
            [
                'id' => 11,
                'title' => 'Strategi Marketing untuk Bisnis Distribusi di Era Digital',
                'slug' => 'strategi-marketing-bisnis-distribusi',
                'excerpt' => 'Panduan praktis menggunakan digital marketing untuk meningkatkan penjualan bisnis distribusi Anda.',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800',
                'category' => 'Bisnis',
                'date' => '2024-11-05',
                'author' => 'Digital Marketing Expert',
                'reading_time' => '9 min read',
                'views' => 2567
            ],
            [
                'id' => 12,
                'title' => 'Cara Mengatasi Kulit Kering di Musim Kemarau',
                'slug' => 'mengatasi-kulit-kering-musim-kemarau',
                'excerpt' => 'Tips efektif menjaga kelembaban kulit saat cuaca panas dan kering dengan produk yang tepat.',
                'image' => 'https://images.unsplash.com/photo-1515377905703-c4788e51af15?w=800',
                'category' => 'Kesehatan',
                'date' => '2024-11-02',
                'author' => 'Dr. Skin Care',
                'reading_time' => '5 min read',
                'views' => 3156
            ]
        ];
    }

    public function index()
    {
        $articles = $this->getAllArticles();

        return view('blog.index', compact('articles'));
    }

    public function show($slug)
    {
        // Cari artikel berdasarkan slug
        $articles = $this->getAllArticles();
        $article = collect($articles)->firstWhere('slug', $slug);

        // Jika artikel tidak ditemukan, redirect ke halaman blog
        if (!$article) {
            return redirect()->route('blog')->with('error', 'Artikel tidak ditemukan');
        }

        // Ambil 3 artikel related (artikel dengan kategori yang sama atau artikel terbaru)
        $relatedArticles = collect($articles)
            ->where('slug', '!=', $slug)
            ->where('category', $article['category'])
            ->take(3);

        // Jika artikel related kurang dari 3, tambahkan artikel terbaru
        if ($relatedArticles->count() < 3) {
            $needed = 3 - $relatedArticles->count();
            $moreArticles = collect($articles)
                ->where('slug', '!=', $slug)
                ->whereNotIn('slug', $relatedArticles->pluck('slug'))
                ->take($needed);

            $relatedArticles = $relatedArticles->merge($moreArticles);
        }

        return view('blog.show', compact('article', 'relatedArticles'));
    }

    public function category($category)
    {
        // Filter artikel berdasarkan kategori
        $articles = collect($this->getAllArticles())
            ->filter(function ($article) use ($category) {
                $articleCategory = strtolower(str_replace([' & ', ' '], ['-', '-'], $article['category']));
                return $articleCategory === $category;
            })
            ->values()
            ->all();

        $categoryName = ucwords(str_replace('-', ' ', $category));

        return view('blog.category', compact('articles', 'categoryName'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $articles = collect($this->getAllArticles())
            ->filter(function ($article) use ($query) {
                return stripos($article['title'], $query) !== false ||
                    stripos($article['excerpt'], $query) !== false;
            })
            ->values()
            ->all();

        return view('blog.search', compact('articles', 'query'));
    }
}