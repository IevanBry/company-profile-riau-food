@extends('layouts.app')

@section('title', 'Beranda - PT. Riau Food Lestari')

@section('content')

    <!-- Hero Section -->
    <section id="home" class="hero-gradient text-white py-20 md:py-32 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-72 h-72 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0" data-aos="fade-right">
                    <div class="inline-block bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full mb-6">
                        <span class="text-sm font-semibold">✨ Importir & Distributor Resmi</span>
                    </div>
                    <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                        Distributor <span class="text-yellow-300">Kusuka Body Shampoo</span> Terpercaya
                    </h1>
                    <p class="text-xl mb-8 text-gray-100">
                        PT. Riau Food Lestari adalah importir dan distributor resmi Kusuka Body Shampoo dari Malaysia ke
                        Indonesia, melayani kebutuhan personal care berkualitas tinggi untuk seluruh Indonesia.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#products"
                            class="bg-white text-orange-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition text-center shadow-lg">
                            <i class="fas fa-shopping-basket mr-2"></i> Lihat Produk Kami
                        </a>
                        <a href="#about"
                            class="border-2 border-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-orange-600 transition text-center">
                            <i class="fas fa-info-circle mr-2"></i> Tentang Kami
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6 mt-12">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-300">10+</div>
                            <div class="text-sm text-gray-200">Tahun Pengalaman</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-300">4</div>
                            <div class="text-sm text-gray-200">Varian Kusuka</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-300">100%</div>
                            <div class="text-sm text-gray-200">Produk Original</div>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2 flex justify-center" data-aos="fade-left">
                    <div class="relative floating">
                        <div class="w-full max-w-lg">
                            <img src="https://images.unsplash.com/photo-1556228578-0d85b1a4d571?w=800"
                                alt="Kusuka Body Shampoo" class="rounded-3xl shadow-2xl">
                            <div class="absolute -bottom-6 -left-6 bg-white text-orange-600 p-6 rounded-2xl shadow-xl">
                                <i class="fas fa-certificate text-4xl mb-2"></i>
                                <div class="font-bold">Importir Resmi</div>
                                <div class="text-sm">Produk dari Malaysia</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2" data-aos="fade-right">
                    <img src="https://images.unsplash.com/photo-1587854692152-cbe660dbde88?w=800" alt="About Us"
                        class="rounded-2xl shadow-xl">
                </div>

                <div class="md:w-1/2" data-aos="fade-left">
                    <div class="inline-block bg-orange-100 text-orange-700 px-4 py-2 rounded-full mb-4">
                        <span class="font-semibold text-sm">TENTANG KAMI</span>
                    </div>
                    <h2 class="text-4xl font-bold mb-6 text-gray-800">
                        Importir & Distributor <span class="text-gradient">Terpercaya</span>
                    </h2>
                    <p class="text-gray-600 mb-6 text-lg leading-relaxed">
                        PT. Riau Food Lestari adalah perusahaan importir dan distributor yang berlokasi di Pekanbaru, Riau.
                        Kami fokus pada distribusi Kusuka Body Shampoo dari Malaysia dengan supplier resmi SKYMATICS
                        HOLDINGS SDN BHD.
                    </p>
                    <p class="text-gray-600 mb-8 text-lg leading-relaxed">
                        Dengan pengalaman lebih dari 10 tahun dalam industri distribusi, kami memastikan setiap produk yang
                        kami distribusikan adalah produk original dengan kualitas terbaik dari Port Kelang, Malaysia ke
                        seluruh Indonesia melalui Tanjung Priok.
                    </p>

                    <!-- Features -->
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="flex items-start space-x-3">
                            <div class="bg-orange-100 p-2 rounded-lg">
                                <i class="fas fa-check text-orange-600"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800">Importir Resmi</div>
                                <div class="text-sm text-gray-600">Dari Malaysia</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="bg-orange-100 p-2 rounded-lg">
                                <i class="fas fa-check text-orange-600"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800">100% Original</div>
                                <div class="text-sm text-gray-600">Garansi Keaslian</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="bg-orange-100 p-2 rounded-lg">
                                <i class="fas fa-check text-orange-600"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800">Distribusi Luas</div>
                                <div class="text-sm text-gray-600">Seluruh Indonesia</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="bg-orange-100 p-2 rounded-lg">
                                <i class="fas fa-check text-orange-600"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800">Harga Terbaik</div>
                                <div class="text-sm text-gray-600">Langsung dari Importir</div>
                            </div>
                        </div>
                    </div>

                    <a href="#contact"
                        class="inline-block bg-gradient-to-r from-orange-500 to-red-600 text-white px-8 py-4 rounded-full font-semibold hover:from-orange-600 hover:to-red-700 transition shadow-lg">
                        Hubungi Kami <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-20 bg-gradient-to-br from-orange-50 to-red-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-block bg-orange-100 text-orange-700 px-4 py-2 rounded-full mb-4">
                    <span class="font-semibold text-sm">PRODUK KAMI</span>
                </div>
                <h2 class="text-4xl font-bold mb-4 text-gray-800">Kusuka Body Shampoo <span class="text-gradient">Premium
                        Collection</span></h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Kami menyediakan 4 varian Kusuka Body Shampoo original dari Malaysia
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Product 1 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover" data-aos="fade-up"
                    data-aos-delay="0">
                    <div class="relative">
                        <div class="bg-gradient-to-br from-pink-300 to-pink-500 h-56 flex items-center justify-center">
                            <i class="fas fa-flower text-white text-6xl opacity-50"></i>
                        </div>
                        <div
                            class="absolute top-4 right-4 bg-gradient-to-r from-orange-500 to-red-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Best Seller
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-gray-800">Kusuka Rose</h3>
                        <p class="text-gray-600 mb-4">
                            Body shampoo dengan aroma mawar yang elegan dan menyegarkan.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-orange-600 font-bold text-sm">1000ML & 2000ML</span>
                            <button
                                class="bg-orange-100 text-orange-700 px-4 py-2 rounded-lg hover:bg-orange-600 hover:text-white transition font-medium text-sm">
                                Order Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="relative">
                        <div class="bg-gradient-to-br from-amber-200 to-amber-400 h-56 flex items-center justify-center">
                            <i class="fas fa-glass-whiskey text-white text-6xl opacity-50"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-gray-800">Kusuka Goats Milk</h3>
                        <p class="text-gray-600 mb-4">
                            Dengan kandungan susu kambing untuk kulit lebih lembut dan halus.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-orange-600 font-bold text-sm">1000ML & 2000ML</span>
                            <button
                                class="bg-orange-100 text-orange-700 px-4 py-2 rounded-lg hover:bg-orange-600 hover:text-white transition font-medium text-sm">
                                Order Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="relative">
                        <div class="bg-gradient-to-br from-green-300 to-green-500 h-56 flex items-center justify-center">
                            <i class="fas fa-lemon text-white text-6xl opacity-50"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-gray-800">Kusuka Pomelo</h3>
                        <p class="text-gray-600 mb-4">
                            Aroma pomelo segar untuk kesegaran sepanjang hari.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-orange-600 font-bold text-sm">1000ML & 2000ML</span>
                            <button
                                class="bg-orange-100 text-orange-700 px-4 py-2 rounded-lg hover:bg-orange-600 hover:text-white transition font-medium text-sm">
                                Order Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover" data-aos="fade-up"
                    data-aos-delay="300">
                    <div class="relative">
                        <div class="bg-gradient-to-br from-yellow-300 to-yellow-500 h-56 flex items-center justify-center">
                            <i class="fas fa-gem text-white text-6xl opacity-50"></i>
                        </div>
                        <div
                            class="absolute top-4 right-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Premium
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-gray-800">Kusuka Royal Jelly</h3>
                        <p class="text-gray-600 mb-4">
                            Dengan royal jelly untuk nutrisi kulit yang maksimal.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-orange-600 font-bold text-sm">1000ML</span>
                            <button
                                class="bg-orange-100 text-orange-700 px-4 py-2 rounded-lg hover:bg-orange-600 hover:text-white transition font-medium text-sm">
                                Order Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="#contact"
                    class="inline-block bg-gradient-to-r from-orange-500 to-red-600 text-white px-8 py-4 rounded-full font-semibold hover:from-orange-600 hover:to-red-700 transition shadow-lg">
                    Pesan Sekarang <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-block bg-orange-100 text-orange-700 px-4 py-2 rounded-full mb-4">
                    <span class="font-semibold text-sm">LAYANAN KAMI</span>
                </div>
                <h2 class="text-4xl font-bold mb-4 text-gray-800">Layanan <span class="text-gradient">Profesional</span>
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Kami menyediakan berbagai layanan untuk mendukung bisnis Anda
                </p>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center p-6" data-aos="zoom-in" data-aos-delay="0">
                    <div
                        class="bg-gradient-to-br from-orange-400 to-red-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-ship text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Import Resmi</h3>
                    <p class="text-gray-600">
                        Importir resmi dari Malaysia melalui Port Kelang ke Tanjung Priok
                    </p>
                </div>

                <div class="text-center p-6" data-aos="zoom-in" data-aos-delay="100">
                    <div
                        class="bg-gradient-to-br from-blue-400 to-blue-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-truck text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Distribusi Nasional</h3>
                    <p class="text-gray-600">
                        Jaringan distribusi ke seluruh Indonesia dengan sistem logistik terpercaya
                    </p>
                </div>

                <div class="text-center p-6" data-aos="zoom-in" data-aos-delay="200">
                    <div
                        class="bg-gradient-to-br from-yellow-400 to-orange-500 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-handshake text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Program Reseller</h3>
                    <p class="text-gray-600">
                        Peluang kemitraan menguntungkan untuk reseller dan distributor
                    </p>
                </div>

                <div class="text-center p-6" data-aos="zoom-in" data-aos-delay="300">
                    <div
                        class="bg-gradient-to-br from-purple-400 to-purple-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-headset text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Customer Support</h3>
                    <p class="text-gray-600">
                        Tim customer service siap membantu kebutuhan Anda
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-20 bg-gradient-to-br from-orange-50 to-red-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold mb-4 text-gray-800">Mengapa Memilih <span class="text-gradient">PT. Riau Food
                        Lestari?</span></h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Komitmen kami sebagai importir dan distributor terpercaya
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-lg card-hover" data-aos="fade-up" data-aos-delay="0">
                    <div class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-certificate text-orange-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Importir Resmi</h3>
                    <p class="text-gray-600">
                        Partner resmi SKYMATICS HOLDINGS SDN BHD Malaysia untuk distribusi Kusuka di Indonesia.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg card-hover" data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-shield-alt text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">100% Original</h3>
                    <p class="text-gray-600">
                        Semua produk dijamin original langsung dari Port Kelang, Malaysia.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg card-hover" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-dollar-sign text-yellow-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Harga Importir</h3>
                    <p class="text-gray-600">
                        Dapatkan harga terbaik langsung dari importir tanpa perantara.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg card-hover" data-aos="fade-up" data-aos-delay="300">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-users text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Pengalaman 10+ Tahun</h3>
                    <p class="text-gray-600">
                        Didukung tim profesional dengan pengalaman lebih dari 10 tahun di industri distribusi.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg card-hover" data-aos="fade-up" data-aos-delay="400">
                    <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-boxes text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Stok Tersedia</h3>
                    <p class="text-gray-600">
                        Sistem manajemen stok modern memastikan ketersediaan produk.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg card-hover" data-aos="fade-up" data-aos-delay="500">
                    <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-globe text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Distribusi Luas</h3>
                    <p class="text-gray-600">
                        Melayani distribusi ke berbagai wilayah di Indonesia dari Pekanbaru, Riau.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contact" class="py-20 hero-gradient text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 right-20 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-20 w-72 h-72 bg-white rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 text-center relative z-10" data-aos="zoom-in">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Tertarik Menjadi Mitra Kami?</h2>
            <p class="text-xl mb-10 text-gray-100 max-w-2xl mx-auto">
                Hubungi kami sekarang untuk informasi harga, pemesanan, dan program reseller Kusuka Body Shampoo
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                <a href="https://wa.me/6282390017777" target="_blank"
                    class="bg-white text-orange-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition inline-flex items-center justify-center shadow-lg">
                    <i class="fab fa-whatsapp mr-3"></i> +62 823-9001-7777
                </a>
                <a href="mailto:info@riaufoodlestari.com"
                    class="bg-white text-orange-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition inline-flex items-center justify-center shadow-lg">
                    <i class="fas fa-envelope mr-3"></i> info@riaufoodlestari.com
                </a>
            </div>

            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 max-w-4xl mx-auto">
                <div class="grid md:grid-cols-3 gap-6 text-center">
                    <div>
                        <i class="fas fa-map-marker-alt text-3xl mb-3"></i>
                        <h4 class="font-semibold mb-2">Alamat</h4>
                        <p class="text-sm text-gray-200">Pekanbaru, Riau, Indonesia</p>
                    </div>
                    <div>
                        <i class="fas fa-clock text-3xl mb-3"></i>
                        <h4 class="font-semibold mb-2">Jam Operasional</h4>
                        <p class="text-sm text-gray-200">Senin - Sabtu: 08.30 - 17.00 WIB</p>
                    </div>
                    <div>
                        <i class="fas fa-share-alt text-3xl mb-3"></i>
                        <h4 class="font-semibold mb-2">Media Sosial</h4>
                        <div class="flex justify-center gap-4 mt-3">
                            <a href="https://instagram.com/riaufoodlestari" target="_blank"
                                class="bg-white/20 w-10 h-10 rounded-full flex items-center justify-center hover:bg-white hover:text-orange-600 transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://wa.me/6282390017777" target="_blank"
                                class="bg-white/20 w-10 h-10 rounded-full flex items-center justify-center hover:bg-white hover:text-orange-600 transition">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
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

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(249, 115, 22, 0.2);
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }
    </style>
@endpush