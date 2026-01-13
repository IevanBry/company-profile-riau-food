@extends('layouts.app')

@section('title', 'Produk Kami - PT. Riau Food Lestari')

@section('content')

    <!-- Hero Section -->
    <section class="relative h-[500px] overflow-hidden">
        <div class="absolute inset-0 hero-gradient"></div>
        <div class="absolute inset-0 bg-black opacity-40"></div>

        <!-- Animated Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full filter blur-3xl animate-pulse"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full filter blur-3xl animate-pulse"
                style="animation-delay: 1s;"></div>
        </div>

        <div class="container mx-auto px-4 h-full flex items-center justify-center relative z-10">
            <div class="text-center text-white max-w-4xl" data-aos="fade-up">
                <div class="inline-block mb-6">
                    <span class="bg-white/20 backdrop-blur-sm text-white px-6 py-2 rounded-full text-sm font-semibold">
                        <i class="fas fa-box-open mr-2"></i>Produk Import & Lokal Berkualitas
                    </span>
                </div>
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    Katalog Produk <br />
                    <span class="text-yellow-300">Premium Collection</span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-100 mb-8">
                    Importir & Distributor Resmi Berbagai Brand Ternama
                </p>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <i class="fas fa-chevron-down text-white text-2xl"></i>
        </div>
    </section>

    <!-- Category Tabs/Pills -->
    @if(is_array($categories) || ($categories instanceof \Illuminate\Support\Collection && $categories->count() > 0))
        <section class="py-8 bg-white shadow-md sticky top-0 z-40">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap gap-3 justify-center">
                    <button onclick="showCategory('all')"
                        class="category-btn active px-6 py-3 rounded-full font-semibold transition-all">
                        <i class="fas fa-th mr-2"></i>Semua Produk
                    </button>
                    @foreach($categories as $category)
                        @php
                            $slug = is_array($category) ? $category['slug'] : $category->slug;
                            $name = is_array($category) ? $category['name'] : $category->name;
                        @endphp
                        <button onclick="showCategory('{{ $slug }}')"
                            class="category-btn px-6 py-3 rounded-full font-semibold transition-all" data-category="{{ $slug }}">
                            {{ $name }}
                        </button>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Stats Section -->
    <section class="py-12 bg-gradient-to-b from-orange-50 to-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center" data-aos="fade-up">
                    @php
                        $categoryCount = is_array($categories) ? count($categories) : $categories->count();
                    @endphp
                    <div class="text-4xl font-bold text-orange-600 mb-2">{{ $categoryCount }}</div>
                    <p class="text-gray-600">Kategori Brand</p>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                    @php
                        $totalProducts = 0;
                        foreach ($categories as $cat) {
                            $products = is_array($cat) ? ($cat['products'] ?? []) : $cat->products;
                            $totalProducts += is_array($products) ? count($products) : $products->count();
                        }
                    @endphp
                    <div class="text-4xl font-bold text-orange-600 mb-2">{{ $totalProducts }}+</div>
                    <p class="text-gray-600">Varian Produk</p>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-4xl font-bold text-orange-600 mb-2">100%</div>
                    <p class="text-gray-600">Produk Original</p>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-4xl font-bold text-orange-600 mb-2">10+</div>
                    <p class="text-gray-600">Tahun Pengalaman</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products by Category -->
    @forelse($categories as $category)
        @php
            $slug = is_array($category) ? $category['slug'] : $category->slug;
            $name = is_array($category) ? $category['name'] : $category->name;
            $description = is_array($category) ? ($category['description'] ?? null) : $category->description;
            $origin = is_array($category) ? ($category['origin'] ?? null) : $category->origin;
            $badge = is_array($category) ? ($category['badge'] ?? null) : $category->badge;
            $badgeIcon = is_array($category) ? ($category['badge_icon'] ?? null) : $category->badge_icon;
            $badgeColor = is_array($category) ? ($category['badge_color'] ?? 'from-orange-500 to-red-600') : ($category->badge_color ?? 'from-orange-500 to-red-600');
            $products = is_array($category) ? ($category['products'] ?? []) : $category->products;
        @endphp

        <section class="py-20 category-section" data-category="{{ $slug }}">
            <div class="container mx-auto px-4">

                <!-- Category Header -->
                <div class="text-center mb-16" data-aos="fade-up">
                    <div class="inline-flex items-center gap-3 mb-4">
                        @if($origin)
                            <span class="text-3xl">{{ $origin }}</span>
                        @endif
                        @if($badge)
                            <span class="bg-gradient-to-r {{ $badgeColor }} text-white px-4 py-2 rounded-full text-sm font-bold">
                                @if($badgeIcon)
                                    <i class="fas fa-{{ $badgeIcon }} mr-1"></i>
                                @endif
                                {{ $badge }}
                            </span>
                        @endif
                    </div>
                    <h2 class="text-4xl font-bold mb-4 text-gray-800">
                        <span class="text-gradient">{{ $name }}</span>
                    </h2>
                    @if($description)
                        <p class="text-gray-600 text-lg max-w-2xl mx-auto">{{ $description }}</p>
                    @endif
                </div>

                <!-- Products Grid -->
                @php
                    $productCount = is_array($products) ? count($products) : $products->count();
                @endphp

                @if($productCount > 0)
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                        @foreach($products as $index => $product)
                            @php
                                $productName = is_array($product) ? $product['name'] : $product->name;
                                $productDescription = is_array($product) ? $product['description'] : $product->description;
                                $productGradient = is_array($product) ? ($product['gradient'] ?? 'from-orange-300 to-orange-500') : ($product->gradient ?? 'from-orange-300 to-orange-500');
                                $productIcon = is_array($product) ? ($product['icon'] ?? null) : $product->icon;
                                $productImage = is_array($product) ? ($product['image'] ?? null) : $product->image;
                                $productBadge = is_array($product) ? ($product['badge'] ?? null) : $product->badge;
                                $productBadgeColor = is_array($product) ? ($product['badge_color'] ?? 'bg-orange-500') : ($product->badge_color ?? 'bg-orange-500');
                                $productRating = is_array($product) ? ($product['rating'] ?? null) : $product->rating;
                                $productSizes = is_array($product) ? ($product['sizes'] ?? []) : $product->sizes;

                                if (is_string($productSizes)) {
                                    $productSizes = json_decode($productSizes, true) ?? [];
                                }
                            @endphp

                            <div class="group h-full" data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                                <div
                                    class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 h-full flex flex-col">

                                    <!-- Product Image Area - Simplified (Image is now required) -->
                                    <div class="relative h-64 bg-gray-100 overflow-hidden flex-shrink-0">
                                        <img src="{{ asset('storage/' . $productImage) }}" alt="{{ $productName }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">

                                        @if($productBadge)
                                            <div class="absolute top-4 right-4 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg"
                                                style="background-color: {{ $productBadgeColor ?: '#f97316' }};">
                                                <i class="fas fa-fire mr-1"></i>{{ $productBadge }}
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Product Info -->
                                    <div class="p-6 flex flex-col flex-grow">
                                        <div class="flex items-center justify-between mb-3">
                                            <span class="text-xs font-semibold text-orange-600 bg-orange-50 px-3 py-1 rounded-full">
                                                {{ $name }}
                                            </span>
                                            @if($productRating)
                                                <div class="flex items-center text-yellow-400">
                                                    <i class="fas fa-star"></i>
                                                    <span class="text-sm text-gray-600 ml-1">{{ $productRating }}</span>
                                                </div>
                                            @endif
                                        </div>

                                        <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-orange-600 transition">
                                            {{ $productName }}
                                        </h3>

                                        <p class="text-gray-600 mb-4 leading-relaxed text-sm flex-grow">
                                            {{ $productDescription }}
                                        </p>

                                        @if(!empty($productSizes))
                                            <div class="flex items-center gap-3 mb-4 text-xs text-gray-500">
                                                <div class="flex items-center">
                                                    <i class="fas fa-check-circle text-orange-500 mr-1"></i>
                                                    Original
                                                </div>
                                                <div class="flex items-center">
                                                    <i class="fas fa-flask text-orange-500 mr-1"></i>
                                                    {{ implode(', ', $productSizes) }}
                                                </div>
                                            </div>
                                        @endif

                                        <div class="flex items-center justify-between pt-4 border-t border-gray-100 mt-auto">
                                            <div>
                                                <p class="text-xs text-gray-500">Hubungi untuk harga</p>
                                                <p class="text-base font-bold text-orange-600">Terbaik</p>
                                            </div>
                                            <a href="https://wa.me/6282390017777?text=Halo, saya tertarik dengan {{ $productName }}"
                                                target="_blank"
                                                class="bg-gradient-to-r from-orange-500 to-red-600 text-white px-4 py-2 rounded-xl hover:from-orange-600 hover:to-red-700 transition font-medium shadow-lg hover:shadow-xl text-sm">
                                                <i class="fas fa-phone mr-1"></i>Order
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <i class="fas fa-box-open text-6xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg">Belum ada produk dalam kategori ini</p>
                    </div>
                @endif
            </div>
        </section>
    @empty
        <section class="py-20">
            <div class="container mx-auto px-4">
                <div class="text-center py-12">
                    <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg">Belum ada produk yang tersedia</p>
                    <p class="text-gray-400 text-sm mt-2">Silakan tambahkan kategori dan produk melalui dashboard admin</p>
                </div>
            </div>
        </section>
    @endforelse

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Mengapa Memilih Kami?</h2>
                <p class="text-xl text-gray-600">Keunggulan sebagai Importir & Distributor Resmi</p>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center p-6" data-aos="fade-up">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-certificate text-3xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">100% Original</h3>
                    <p class="text-gray-600">Semua produk dijamin original dari distributor resmi</p>
                </div>

                <div class="text-center p-6" data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-globe text-3xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Multi Brand</h3>
                    <p class="text-gray-600">Distributor berbagai brand ternama dari berbagai negara</p>
                </div>

                <div class="text-center p-6" data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-700 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-truck text-3xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Pengiriman Cepat</h3>
                    <p class="text-gray-600">Distribusi ke seluruh Indonesia dengan sistem logistik terpercaya</p>
                </div>

                <div class="text-center p-6" data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-700 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-tags text-3xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Harga Kompetitif</h3>
                    <p class="text-gray-600">Harga terbaik langsung dari importir dan distributor</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 hero-gradient relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full filter blur-3xl animate-pulse"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-white rounded-full filter blur-3xl animate-pulse"
                style="animation-delay: 1.5s;"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center text-white" data-aos="fade-up">
                <div class="inline-block mb-6">
                    <span class="bg-white/20 backdrop-blur-sm text-white px-6 py-3 rounded-full text-sm font-semibold">
                        <i class="fas fa-bullhorn mr-2"></i>Peluang Bisnis
                    </span>
                </div>

                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    Tertarik Menjadi Reseller atau Distributor?
                </h2>

                <p class="text-xl md:text-2xl text-gray-100 mb-10 leading-relaxed">
                    Dapatkan harga spesial untuk pembelian dalam jumlah besar! Hubungi kami untuk informasi program
                    kemitraan dan harga terbaik.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="https://wa.me/6282390017777" target="_blank"
                        class="inline-flex items-center justify-center bg-white text-orange-600 px-10 py-5 rounded-2xl font-bold text-lg hover:bg-gray-100 transition shadow-2xl transform hover:-translate-y-1">
                        <i class="fab fa-whatsapp mr-3"></i>Chat WhatsApp
                    </a>
                    <a href="tel:+6282390017777"
                        class="inline-flex items-center justify-center bg-orange-800 text-white px-10 py-5 rounded-2xl font-bold text-lg hover:bg-orange-900 transition shadow-2xl border-2 border-white/30 transform hover:-translate-y-1">
                        <i class="fas fa-phone-alt mr-3"></i>Telepon Kami
                    </a>
                </div>

                @php
                    $categoryCount = is_array($categories) ? count($categories) : $categories->count();
                @endphp
                <div class="grid grid-cols-3 gap-8 mt-16 max-w-2xl mx-auto">
                    <div class="text-center">
                        <div class="text-4xl font-bold mb-2">🌍</div>
                        <p class="text-orange-100">Multi Brand Import</p>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold mb-2">{{ $categoryCount }}</div>
                        <p class="text-orange-100">Kategori Brand</p>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold mb-2">10+</div>
                        <p class="text-orange-100">Tahun Pengalaman</p>
                    </div>
                </div>
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

        .category-btn {
            background: white;
            color: #6B7280;
            border: 2px solid #E5E7EB;
        }

        .category-btn:hover {
            border-color: #F97316;
            color: #F97316;
            transform: translateY(-2px);
        }

        .category-btn.active {
            background: linear-gradient(135deg, #F97316 0%, #DC2626 100%);
            color: white;
            border-color: transparent;
            box-shadow: 0 4px 15px rgba(249, 115, 22, 0.3);
        }

        .category-section {
            display: block;
        }

        .category-section.hidden {
            display: none;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function showCategory(category, clickedButton = null) {
            // Update button states
            document.querySelectorAll('.category-btn').forEach(btn => {
                btn.classList.remove('active');
            });

            // Add active class to clicked button or find the "all" button
            if (clickedButton) {
                clickedButton.classList.add('active');
            } else {
                // If no button clicked (e.g., on page load), activate the first button
                const allButton = document.querySelector('.category-btn');
                if (allButton) {
                    allButton.classList.add('active');
                }
            }

            // Show/hide sections
            const sections = document.querySelectorAll('.category-section');

            if (category === 'all') {
                sections.forEach(section => {
                    section.classList.remove('hidden');
                });
            } else {
                sections.forEach(section => {
                    if (section.dataset.category === category) {
                        section.classList.remove('hidden');
                    } else {
                        section.classList.add('hidden');
                    }
                });
            }

            // Smooth scroll to first visible section
            if (category !== 'all' && clickedButton) {
                setTimeout(() => {
                    const firstVisible = document.querySelector('.category-section:not(.hidden)');
                    if (firstVisible) {
                        firstVisible.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }, 100);
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function () {
            showCategory('all', null);
        });
    </script>
@endpush