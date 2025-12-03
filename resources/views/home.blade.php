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
                        <span class="text-sm font-semibold">🌱 Produk Pangan Berkualitas Tinggi</span>
                    </div>
                    <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                        Menyediakan Solusi <span class="text-yellow-300">Pangan Terbaik</span> untuk Indonesia
                    </h1>
                    <p class="text-xl mb-8 text-gray-100">
                        PT. Riau Food Lestari berkomitmen menghadirkan produk pangan berkualitas dengan standar
                        internasional untuk memenuhi kebutuhan konsumen di seluruh Indonesia.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#products"
                            class="bg-white text-green-700 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition text-center shadow-lg">
                            <i class="fas fa-shopping-basket mr-2"></i> Lihat Produk Kami
                        </a>
                        <a href="#about"
                            class="border-2 border-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-green-700 transition text-center">
                            <i class="fas fa-info-circle mr-2"></i> Tentang Kami
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6 mt-12">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-300">15+</div>
                            <div class="text-sm text-gray-200">Tahun Pengalaman</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-300">50+</div>
                            <div class="text-sm text-gray-200">Produk Unggulan</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-300">100%</div>
                            <div class="text-sm text-gray-200">Halal & Aman</div>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2 flex justify-center" data-aos="fade-left">
                    <div class="relative floating">
                        <div class="w-full max-w-lg">
                            <img src="https://images.unsplash.com/photo-1488459716781-31db52582fe9?w=800"
                                alt="Food Products" class="rounded-3xl shadow-2xl">
                            <div class="absolute -bottom-6 -left-6 bg-white text-green-700 p-6 rounded-2xl shadow-xl">
                                <i class="fas fa-certificate text-4xl mb-2"></i>
                                <div class="font-bold">Sertifikasi</div>
                                <div class="text-sm">BPOM & Halal</div>
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
                    <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=800" alt="About Us"
                        class="rounded-2xl shadow-xl">
                </div>

                <div class="md:w-1/2" data-aos="fade-left">
                    <div class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full mb-4">
                        <span class="font-semibold text-sm">TENTANG KAMI</span>
                    </div>
                    <h2 class="text-4xl font-bold mb-6 text-gray-800">
                        Perusahaan Pangan Terpercaya <span class="text-gradient">Sejak 2008</span>
                    </h2>
                    <p class="text-gray-600 mb-6 text-lg leading-relaxed">
                        PT. Riau Food Lestari adalah perusahaan yang bergerak di bidang produksi dan distribusi produk
                        pangan berkualitas tinggi. Kami telah melayani ribuan pelanggan di seluruh Indonesia dengan komitmen
                        kualitas dan kepuasan pelanggan.
                    </p>
                    <p class="text-gray-600 mb-8 text-lg leading-relaxed">
                        Dengan fasilitas produksi modern dan tim profesional berpengalaman, kami memastikan setiap produk
                        yang dihasilkan memenuhi standar keamanan pangan nasional dan internasional.
                    </p>

                    <!-- Features -->
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="flex items-start space-x-3">
                            <div class="bg-green-100 p-2 rounded-lg">
                                <i class="fas fa-check text-green-600"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800">Sertifikasi Lengkap</div>
                                <div class="text-sm text-gray-600">BPOM, Halal, ISO</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="bg-green-100 p-2 rounded-lg">
                                <i class="fas fa-check text-green-600"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800">Kualitas Terjamin</div>
                                <div class="text-sm text-gray-600">Kontrol mutu ketat</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="bg-green-100 p-2 rounded-lg">
                                <i class="fas fa-check text-green-600"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800">Distribusi Luas</div>
                                <div class="text-sm text-gray-600">Seluruh Indonesia</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="bg-green-100 p-2 rounded-lg">
                                <i class="fas fa-check text-green-600"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800">Harga Kompetitif</div>
                                <div class="text-sm text-gray-600">Nilai terbaik</div>
                            </div>
                        </div>
                    </div>

                    <a href="#contact"
                        class="inline-block bg-green-600 text-white px-8 py-4 rounded-full font-semibold hover:bg-green-700 transition">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full mb-4">
                    <span class="font-semibold text-sm">PRODUK KAMI</span>
                </div>
                <h2 class="text-4xl font-bold mb-4 text-gray-800">Produk Unggulan <span class="text-gradient">Berkualitas
                        Tinggi</span></h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Kami menyediakan berbagai produk pangan berkualitas untuk memenuhi kebutuhan Anda
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Product 1 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover" data-aos="fade-up"
                    data-aos-delay="0">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1586201375761-83865001e31c?w=500" alt="Mie Instan"
                            class="w-full h-56 object-cover">
                        <div
                            class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Best Seller
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-gray-800">Mie Instan Premium</h3>
                        <p class="text-gray-600 mb-4">
                            Mie instan berkualitas tinggi dengan berbagai varian rasa yang lezat dan bergizi.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-bold text-lg">20+ Varian</span>
                            <button
                                class="bg-green-100 text-green-700 px-4 py-2 rounded-lg hover:bg-green-600 hover:text-white transition font-medium">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1599490659213-e2b9527bd087?w=500" alt="Bumbu Masak"
                            class="w-full h-56 object-cover">
                        <div
                            class="absolute top-4 right-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            New
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-gray-800">Bumbu Masak Praktis</h3>
                        <p class="text-gray-600 mb-4">
                            Bumbu siap pakai yang memudahkan memasak dengan cita rasa autentik Nusantara.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-bold text-lg">15+ Resep</span>
                            <button
                                class="bg-green-100 text-green-700 px-4 py-2 rounded-lg hover:bg-green-600 hover:text-white transition font-medium">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1558961363-fa8fdf82db35?w=500" alt="Makanan Ringan"
                            class="w-full h-56 object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-gray-800">Makanan Ringan</h3>
                        <p class="text-gray-600 mb-4">
                            Snack dan camilan sehat untuk keluarga dengan pilihan rasa yang beragam.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-bold text-lg">30+ Produk</span>
                            <button
                                class="bg-green-100 text-green-700 px-4 py-2 rounded-lg hover:bg-green-600 hover:text-white transition font-medium">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="#products"
                    class="inline-block bg-green-600 text-white px-8 py-4 rounded-full font-semibold hover:bg-green-700 transition shadow-lg">
                    Lihat Semua Produk <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full mb-4">
                    <span class="font-semibold text-sm">LAYANAN KAMI</span>
                </div>
                <h2 class="text-4xl font-bold mb-4 text-gray-800">Layanan <span class="text-gradient">Terpadu</span></h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Kami menyediakan berbagai layanan untuk mendukung bisnis Anda
                </p>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center p-6" data-aos="zoom-in" data-aos-delay="0">
                    <div
                        class="bg-gradient-to-br from-green-400 to-green-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-truck text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Distribusi</h3>
                    <p class="text-gray-600">
                        Jaringan distribusi luas ke seluruh Indonesia dengan sistem logistik modern
                    </p>
                </div>

                <div class="text-center p-6" data-aos="zoom-in" data-aos-delay="100">
                    <div
                        class="bg-gradient-to-br from-blue-400 to-blue-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-industry text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Produksi</h3>
                    <p class="text-gray-600">
                        Fasilitas produksi berstandar internasional dengan kontrol kualitas ketat
                    </p>
                </div>

                <div class="text-center p-6" data-aos="zoom-in" data-aos-delay="200">
                    <div
                        class="bg-gradient-to-br from-yellow-400 to-yellow-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-handshake text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Kemitraan</h3>
                    <p class="text-gray-600">
                        Program kemitraan yang menguntungkan untuk reseller dan distributor
                    </p>
                </div>

                <div class="text-center p-6" data-aos="zoom-in" data-aos-delay="300">
                    <div
                        class="bg-gradient-to-br from-purple-400 to-purple-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-headset text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Customer Service</h3>
                    <p class="text-gray-600">
                        Tim customer service profesional siap membantu 24/7
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-20 bg-gradient-to-br from-green-50 to-blue-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold mb-4 text-gray-800">Mengapa Memilih <span class="text-gradient">PT. Riau Food
                        Lestari?</span></h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Komitmen kami untuk memberikan yang terbaik bagi pelanggan
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-lg card-hover" data-aos="fade-up" data-aos-delay="0">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-certificate text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Sertifikasi Resmi</h3>
                    <p class="text-gray-600">
                        Semua produk telah memiliki sertifikasi BPOM, Halal MUI, dan standar keamanan pangan lainnya.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg card-hover" data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-shield-alt text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Jaminan Kualitas</h3>
                    <p class="text-gray-600">
                        Kontrol kualitas yang ketat di setiap tahap produksi untuk memastikan produk terbaik.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg card-hover" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-dollar-sign text-yellow-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Harga Terjangkau</h3>
                    <p class="text-gray-600">
                        Harga kompetitif dengan kualitas premium, memberikan nilai terbaik untuk pelanggan.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg card-hover" data-aos="fade-up" data-aos-delay="300">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-users text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Tim Profesional</h3>
                    <p class="text-gray-600">
                        Didukung oleh tim berpengalaman dan terlatih di bidang produksi makanan.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg card-hover" data-aos="fade-up" data-aos-delay="400">
                    <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-leaf text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Bahan Alami</h3>
                    <p class="text-gray-600">
                        Menggunakan bahan baku pilihan dan alami tanpa bahan pengawet berbahaya.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg card-hover" data-aos="fade-up" data-aos-delay="500">
                    <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-globe text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Jangkauan Luas</h3>
                    <p class="text-gray-600">
                        Produk tersedia di seluruh Indonesia melalui jaringan distribusi yang luas.
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
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Tertarik Bekerja Sama Dengan Kami?</h2>
            <p class="text-xl mb-10 text-gray-100 max-w-2xl mx-auto">
                Hubungi kami sekarang untuk informasi lebih lanjut tentang produk dan layanan kami
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                <a href="tel:+62761234567"
                    class="bg-white text-green-700 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition inline-flex items-center justify-center shadow-lg">
                    <i class="fas fa-phone mr-3"></i> +62 761 234 567
                </a>
                <a href="mailto:info@riaufoodlestari.com"
                    class="bg-white text-green-700 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition inline-flex items-center justify-center shadow-lg">
                    <i class="fas fa-envelope mr-3"></i> info@riaufoodlestari.com
                </a>
            </div>

            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 max-w-4xl mx-auto">
                <div class="grid md:grid-cols-3 gap-6 text-center">
                    <div>
                        <i class="fas fa-map-marker-alt text-3xl mb-3"></i>
                        <h4 class="font-semibold mb-2">Alamat</h4>
                        <p class="text-sm text-gray-200">Jl. Raya Pekanbaru-Dumai KM 25, Riau, Indonesia</p>
                    </div>
                    <div>
                        <i class="fas fa-clock text-3xl mb-3"></i>
                        <h4 class="font-semibold mb-2">Jam Operasional</h4>
                        <p class="text-sm text-gray-200">Senin - Jumat: 08.00 - 17.00 WIB<br>Sabtu: 08.00 - 12.00 WIB</p>
                    </div>
                    <div>
                        <i class="fas fa-share-alt text-3xl mb-3"></i>
                        <h4 class="font-semibold mb-2">Media Sosial</h4>
                        <div class="flex justify-center gap-4 mt-3">
                            <a href="#"
                                class="bg-white/20 w-10 h-10 rounded-full flex items-center justify-center hover:bg-white hover:text-green-700 transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#"
                                class="bg-white/20 w-10 h-10 rounded-full flex items-center justify-center hover:bg-white hover:text-green-700 transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#"
                                class="bg-white/20 w-10 h-10 rounded-full flex items-center justify-center hover:bg-white hover:text-green-700 transition">
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
            background: linear-gradient(135deg, #2D5016 0%, #4A7C2C 50%, #6B9D3E 100%);
        }

        .text-gradient {
            background: linear-gradient(135deg, #4A7C2C 0%, #6B9D3E 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
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