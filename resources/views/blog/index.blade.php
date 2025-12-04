@extends('layouts.app')

@section('title', 'Blog & Artikel - PT. Riau Food Lestari')

@section('content')

    <!-- Hero Section -->
    <section class="relative h-[500px] overflow-hidden">
        <div class="absolute inset-0 hero-gradient"></div>
        <div class="absolute inset-0 bg-black opacity-40"></div>

        <!-- Animated Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full filter blur-3xl animate-pulse"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full filter blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <div class="container mx-auto px-4 h-full flex items-center justify-center relative z-10">
            <div class="text-center text-white max-w-4xl" data-aos="fade-up">
                <div class="inline-block mb-6">
                    <span class="bg-white/20 backdrop-blur-sm text-white px-6 py-2 rounded-full text-sm font-semibold">
                        <i class="fas fa-newspaper mr-2"></i>Blog & Artikel Terbaru
                    </span>
                </div>
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    Insight & <span class="text-yellow-300">Inspirasi</span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-100 mb-8">
                    Tips, berita, dan informasi seputar produk dan industri distribusi
                </p>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <i class="fas fa-chevron-down text-white text-2xl"></i>
        </div>
    </section>

    <!-- Category Filter -->
    <section class="py-8 bg-white shadow-md sticky top-20 z-40">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap gap-3 justify-center">
                <button onclick="filterCategory('all')" class="filter-btn active px-6 py-2.5 rounded-full font-semibold transition-all">
                    <i class="fas fa-th-large mr-2"></i>Semua Artikel
                </button>
                <button onclick="filterCategory('tips')" class="filter-btn px-6 py-2.5 rounded-full font-semibold transition-all">
                    <i class="fas fa-lightbulb mr-2"></i>Tips & Tricks
                </button>
                <button onclick="filterCategory('kesehatan')" class="filter-btn px-6 py-2.5 rounded-full font-semibold transition-all">
                    <i class="fas fa-heartbeat mr-2"></i>Kesehatan
                </button>
                <button onclick="filterCategory('bisnis')" class="filter-btn px-6 py-2.5 rounded-full font-semibold transition-all">
                    <i class="fas fa-chart-line mr-2"></i>Bisnis
                </button>
                <button onclick="filterCategory('produk')" class="filter-btn px-6 py-2.5 rounded-full font-semibold transition-all">
                    <i class="fas fa-box mr-2"></i>Produk
                </button>
            </div>
        </div>
    </section>

    <!-- Featured Article -->
    <section class="py-12 bg-gradient-to-b from-orange-50 to-white">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-3xl overflow-hidden shadow-2xl" data-aos="fade-up">
                <div class="grid md:grid-cols-2 gap-0">
                    <div class="relative h-96 md:h-auto overflow-hidden">
                        <img src="{{ $articles[0]['image'] }}" alt="{{ $articles[0]['title'] }}" 
                             class="w-full h-full object-cover">
                        <div class="absolute top-6 left-6 bg-gradient-to-r from-orange-500 to-red-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                            <i class="fas fa-star mr-2"></i>Featured Article
                        </div>
                    </div>
                    <div class="p-8 md:p-12 flex flex-col justify-center">
                        <div class="inline-block bg-orange-100 text-orange-700 px-4 py-1.5 rounded-full text-sm font-semibold mb-4 w-fit">
                            {{ $articles[0]['category'] }}
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 hover:text-orange-600 transition">
                            {{ $articles[0]['title'] }}
                        </h2>
                        <p class="text-gray-600 mb-6 text-lg leading-relaxed">
                            {{ $articles[0]['excerpt'] }}
                        </p>
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-800">{{ $articles[0]['author'] }}</div>
                                    <div class="text-sm text-gray-500">
                                        {{ date('d M Y', strtotime($articles[0]['date'])) }} • {{ $articles[0]['reading_time'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('blog.show', $articles[0]['slug']) }}" 
                           class="inline-flex items-center justify-center bg-gradient-to-r from-orange-500 to-red-600 text-white px-8 py-4 rounded-xl hover:from-orange-600 hover:to-red-700 transition font-semibold shadow-lg hover:shadow-xl">
                            Baca Artikel Lengkap <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Articles Grid -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-4xl font-bold mb-4 text-gray-800">
                    Artikel <span class="text-gradient">Terbaru</span>
                </h2>
                <p class="text-gray-600 text-lg">Temukan informasi dan tips berguna untuk Anda</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="articles-grid">
                @foreach($articles as $index => $article)
                    @if($index > 0) {{-- Skip first article since it's featured --}}
                        <article class="article-card bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3" 
                                 data-category="{{ strtolower(str_replace(' & ', '-', str_replace(' ', '-', $article['category']))) }}"
                                 data-aos="fade-up" 
                                 data-aos-delay="{{ ($index - 1) * 100 }}">
                            <div class="relative h-64 overflow-hidden group">
                                <img src="{{ $article['image'] }}" 
                                     alt="{{ $article['title'] }}" 
                                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="absolute top-4 left-4 bg-orange-500 text-white px-4 py-1.5 rounded-full text-sm font-semibold shadow-lg">
                                    {{ $article['category'] }}
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-500 mb-3">
                                    <i class="fas fa-calendar mr-2 text-orange-500"></i>
                                    {{ date('d M Y', strtotime($article['date'])) }}
                                    <span class="mx-2">•</span>
                                    <i class="fas fa-clock mr-2 text-orange-500"></i>
                                    {{ $article['reading_time'] }}
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-3 hover:text-orange-600 transition line-clamp-2">
                                    {{ $article['title'] }}
                                </h3>
                                <p class="text-gray-600 mb-4 leading-relaxed line-clamp-3">{{ $article['excerpt'] }}</p>
                                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                    <div class="flex items-center text-sm text-gray-500">
                                        <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center mr-2">
                                            <i class="fas fa-user text-white text-xs"></i>
                                        </div>
                                        <span class="font-medium">{{ $article['author'] }}</span>
                                    </div>
                                    <a href="{{ route('blog.show', $article['slug']) }}" 
                                       class="text-orange-600 font-semibold hover:text-orange-700 transition group">
                                        Baca <i class="fas fa-arrow-right ml-1 group-hover:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endif
                @endforeach
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12" data-aos="fade-up">
                <button class="bg-gradient-to-r from-orange-500 to-red-600 text-white px-8 py-4 rounded-full hover:from-orange-600 hover:to-red-700 transition font-semibold shadow-lg hover:shadow-xl">
                    <i class="fas fa-sync-alt mr-2"></i>Muat Lebih Banyak
                </button>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-24 hero-gradient relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full filter blur-3xl animate-pulse"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-white rounded-full filter blur-3xl animate-pulse" style="animation-delay: 1.5s;"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center text-white" data-aos="fade-up">
                <div class="inline-block mb-6">
                    <span class="bg-white/20 backdrop-blur-sm text-white px-6 py-3 rounded-full text-sm font-semibold">
                        <i class="fas fa-envelope mr-2"></i>Newsletter
                    </span>
                </div>

                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    Dapatkan Update Artikel Terbaru
                </h2>

                <p class="text-xl md:text-2xl text-gray-100 mb-10 leading-relaxed">
                    Berlangganan newsletter kami dan dapatkan tips, berita, dan informasi terbaru langsung di inbox Anda
                </p>

                <form class="max-w-xl mx-auto">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <input type="email" 
                               placeholder="Masukkan email Anda" 
                               class="flex-1 px-6 py-4 rounded-full text-gray-800 font-medium focus:outline-none focus:ring-4 focus:ring-white/30 shadow-xl">
                        <button type="submit" 
                                class="bg-white text-orange-600 px-8 py-4 rounded-full font-bold hover:bg-gray-100 transition shadow-xl">
                            <i class="fas fa-paper-plane mr-2"></i>Subscribe
                        </button>
                    </div>
                    <p class="text-sm text-orange-100 mt-4">
                        <i class="fas fa-lock mr-1"></i> Kami menghargai privasi Anda. Tidak ada spam!
                    </p>
                </form>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #F97316 0%, #EA580C 50%, #DC2626 100%);
        }

        .text-gradient {
            background: linear-gradient(135deg, #F97316 0%, #DC2626 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .filter-btn {
            background: white;
            color: #6B7280;
            border: 2px solid #E5E7EB;
        }

        .filter-btn:hover {
            border-color: #F97316;
            color: #F97316;
            transform: translateY(-2px);
        }

        .filter-btn.active {
            background: linear-gradient(135deg, #F97316 0%, #DC2626 100%);
            color: white;
            border-color: transparent;
            box-shadow: 0 4px 15px rgba(249, 115, 22, 0.3);
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .article-card.hidden {
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function filterCategory(category) {
            // Update button states
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');

            // Filter articles
            const articles = document.querySelectorAll('.article-card');

            articles.forEach(article => {
                if (category === 'all') {
                    article.classList.remove('hidden');
                } else {
                    const articleCategory = article.dataset.category;
                    if (articleCategory === category) {
                        article.classList.remove('hidden');
                    } else {
                        article.classList.add('hidden');
                    }
                }
            });

            // Re-initialize AOS for filtered items
            if (typeof AOS !== 'undefined') {
                AOS.refresh();
            }
        }
    </script>
@endpush