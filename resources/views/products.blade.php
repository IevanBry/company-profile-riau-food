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
    <section class="py-8 bg-white shadow-md sticky top-0 z-40">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap gap-3 justify-center">
                <button onclick="showCategory('all')"
                    class="category-btn active px-6 py-3 rounded-full font-semibold transition-all">
                    <i class="fas fa-th mr-2"></i>Semua Produk
                </button>
                @foreach($categories as $category)
                    <button onclick="showCategory('{{ $category['slug'] }}')"
                        class="category-btn px-6 py-3 rounded-full font-semibold transition-all"
                        data-category="{{ $category['slug'] }}">
                        {{ $category['name'] }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-12 bg-gradient-to-b from-orange-50 to-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center" data-aos="fade-up">
                    <div class="text-4xl font-bold text-orange-600 mb-2">{{ count($categories) }}</div>
                    <p class="text-gray-600">Kategori Brand</p>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-4xl font-bold text-orange-600 mb-2">50+</div>
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
    @foreach($categories as $category)
        <section class="py-20 category-section" data-category="{{ $category['slug'] }}">
            <div class="container mx-auto px-4">

                <!-- Category Header -->
                <div class="text-center mb-16" data-aos="fade-up">
                    <div class="inline-block bg-orange-100 text-orange-700 px-4 py-2 rounded-full mb-4">
                        <span class="font-semibold text-sm">{{ $category['origin'] }}</span>
                    </div>
                    <h2 class="text-4xl font-bold mb-4 text-gray-800">
                        <span class="text-gradient">{{ $category['name'] }}</span>
                    </h2>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                        {{ $category['description'] }}
                    </p>
                    @if($category['badge'])
                        <div
                            class="inline-flex items-center bg-gradient-to-r {{ $category['badge_color'] }} text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg mt-4">
                            <i class="fas fa-{{ $category['badge_icon'] }} mr-2"></i>{{ $category['badge'] }}
                        </div>
                    @endif
                </div>

                <!-- Products Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($products[$category['slug']] as $index => $product)
                        <div class="group h-full" data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                            <div
                                class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 h-full flex flex-col">

                                <!-- Product Image/Icon Area -->
                                <div
                                    class="relative h-64 bg-gradient-to-br {{ $product['gradient'] }} overflow-hidden flex-shrink-0">
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="text-center transform group-hover:scale-110 transition-transform duration-500">
                                            <i class="fas fa-{{ $product['icon'] }} text-6xl text-white opacity-90 mb-3"></i>
                                            <div class="text-white font-bold text-xl">
                                                {{ strtoupper(explode(' ', $product['name'])[count(explode(' ', $product['name'])) - 1]) }}
                                            </div>
                                        </div>
                                    </div>
                                    @if($product['badge'])
                                        <div
                                            class="absolute top-4 right-4 {{ $product['badge_color'] }} text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                            <i class="fas fa-fire mr-1"></i>{{ $product['badge'] }}
                                        </div>
                                    @endif
                                </div>

                                <!-- Product Info -->
                                <div class="p-6 flex flex-col flex-grow">
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="text-xs font-semibold text-orange-600 bg-orange-50 px-3 py-1 rounded-full">
                                            {{ $category['name'] }}
                                        </span>
                                        <div class="flex items-center text-yellow-400">
                                            <i class="fas fa-star"></i>
                                            <span class="text-sm text-gray-600 ml-1">{{ $product['rating'] }}</span>
                                        </div>
                                    </div>

                                    <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-orange-600 transition">
                                        {{ $product['name'] }}
                                    </h3>

                                    <p class="text-gray-600 mb-4 leading-relaxed text-sm flex-grow">
                                        {{ $product['description'] }}
                                    </p>

                                    <div class="flex items-center gap-3 mb-4 text-xs text-gray-500">
                                        <div class="flex items-center">
                                            <i class="fas fa-check-circle text-orange-500 mr-1"></i>
                                            Original
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-flask text-orange-500 mr-1"></i>
                                            {{ implode(', ', $product['sizes']) }}
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between pt-4 border-t border-gray-100 mt-auto">
                                        <div>
                                            <p class="text-xs text-gray-500">Hubungi untuk harga</p>
                                            <p class="text-base font-bold text-orange-600">Terbaik</p>
                                        </div>
                                        <a href="https://wa.me/6282390017777?text=Halo, saya tertarik dengan {{ $product['name'] }}"
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
            </div>
        </section>
    @endforeach

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

                <div class="grid grid-cols-3 gap-8 mt-16 max-w-2xl mx-auto">
                    <div class="text-center">
                        <div class="text-4xl font-bold mb-2">🌍</div>
                        <p class="text-orange-100">Multi Brand Import</p>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold mb-2">{{ count($categories) }}</div>
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
        function showCategory(category) {
            // Update button states
            document.querySelectorAll('.category-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');

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
            setTimeout(() => {
                const firstVisible = document.querySelector('.category-section:not(.hidden)');
                if (firstVisible && category !== 'all') {
                    firstVisible.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }, 100);
        }

        // Initialize - show all categories
        document.addEventListener('DOMContentLoaded', function () {
            showCategory('all');
        });
    </script>
@endpush