@extends('layouts.app')

@section('title', 'Perusahaan - PT. Riau Food Lestari')

@section('content')

    <!-- Page Header -->
    <section class="hero-gradient text-white py-16 md:py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-72 h-72 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold">Tentang Perusahaan Kami</h1>
            <p class="text-xl text-gray-100 mt-4">Mengenal lebih dekat PT. Riau Food Lestari</p>
        </div>
    </section>

    <!-- About Company Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2" data-aos="fade-right">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=800" alt="Perusahaan"
                        class="rounded-2xl shadow-xl">
                </div>

                <div class="md:w-1/2" data-aos="fade-left">
                    <div class="inline-block bg-orange-100 text-orange-700 px-4 py-2 rounded-full mb-4">
                        <span class="font-semibold text-sm">PROFIL PERUSAHAAN</span>
                    </div>
                    <h2 class="text-4xl font-bold mb-6 text-gray-800">
                        PT. Riau Food <span class="text-gradient">Lestari</span>
                    </h2>
                    <p class="text-gray-600 mb-4 text-lg leading-relaxed">
                        PT. Riau Food Lestari adalah perusahaan yang bergerak di bidang importir dan distributor produk
                        kebutuhan sehari-hari berkualitas tinggi. Kami berlokasi di Pekanbaru, Riau dan telah melayani
                        berbagai wilayah di Indonesia.
                    </p>
                    <p class="text-gray-600 mb-4 text-lg leading-relaxed">
                        Dengan pengalaman lebih dari 10 tahun, kami memiliki komitmen kuat dalam menyediakan produk original
                        dan berkualitas dari berbagai supplier terpercaya internasional. Jaringan distribusi kami mencakup
                        seluruh Indonesia dengan sistem logistik yang handal dan profesional.
                    </p>
                    <p class="text-gray-600 mb-8 text-lg leading-relaxed">
                        Kami percaya bahwa kepercayaan pelanggan adalah aset terbesar kami. Oleh karena itu, setiap produk
                        yang kami distribusikan dijamin 100% original dan telah melalui proses quality control yang ketat.
                    </p>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6">
                        <div class="text-center bg-orange-50 p-4 rounded-lg">
                            <div class="text-3xl font-bold text-orange-600">10+</div>
                            <div class="text-sm text-gray-600 mt-2">Tahun Berdiri</div>
                        </div>
                        <div class="text-center bg-orange-50 p-4 rounded-lg">
                            <div class="text-3xl font-bold text-orange-600">50+</div>
                            <div class="text-sm text-gray-600 mt-2">Produk</div>
                        </div>
                        <div class="text-center bg-orange-50 p-4 rounded-lg">
                            <div class="text-3xl font-bold text-orange-600">100%</div>
                            <div class="text-sm text-gray-600 mt-2">Original</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission Section -->
    <section class="py-20 bg-gradient-to-br from-orange-50 to-red-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold mb-4 text-gray-800">Visi & Misi <span class="text-gradient">Kami</span></h2>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                <!-- Vision Card -->
                <div class="bg-white rounded-2xl shadow-lg p-10 card-hover" data-aos="fade-right" data-aos-delay="0">
                    <div class="flex items-start space-x-4 mb-6">
                        <div
                            class="bg-gradient-to-br from-blue-400 to-blue-600 w-16 h-16 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                            <i class="fas fa-eye text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Visi</h3>
                        </div>
                    </div>

                    <p class="text-gray-600 text-lg leading-relaxed">
                        Menjadi importir dan distributor terpercaya yang menyediakan produk berkualitas tinggi dengan harga
                        kompetitif untuk seluruh Indonesia, serta membangun kemitraan bisnis yang saling menguntungkan.
                    </p>
                </div>

                <!-- Mission Card -->
                <div class="bg-white rounded-2xl shadow-lg p-10 card-hover" data-aos="fade-left" data-aos-delay="100">
                    <div class="flex items-start space-x-4 mb-6">
                        <div
                            class="bg-gradient-to-br from-purple-400 to-purple-600 w-16 h-16 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                            <i class="fas fa-bullseye text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Misi</h3>
                        </div>
                    </div>

                    <div class="space-y-3 text-gray-600 text-lg">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-orange-600 mt-1 flex-shrink-0"></i>
                            <span>Menyediakan produk import original dengan jaminan kualitas 100%</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-orange-600 mt-1 flex-shrink-0"></i>
                            <span>Memberikan harga kompetitif dan layanan terbaik kepada pelanggan</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-orange-600 mt-1 flex-shrink-0"></i>
                            <span>Membangun jaringan distribusi yang efisien ke seluruh Indonesia</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-orange-600 mt-1 flex-shrink-0"></i>
                            <span>Menciptakan peluang kemitraan bisnis yang menguntungkan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
                <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-block bg-orange-100 text-orange-700 px-4 py-2 rounded-full mb-4">
                    <span class="font-semibold text-sm">LOKASI KAMI</span>
                </div>
                <h2 class="text-4xl font-bold mb-4 text-gray-800">Temukan <span class="text-gradient">PT. Riau Food Lestari</span></h2>
            </div>            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <!-- Contact Info Cards -->
                <div class="bg-gradient-to-br from-orange-50 to-red-50 p-8 rounded-2xl text-center" data-aos="fade-up"
                    data-aos-delay="0">
                    <div class="bg-orange-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Alamat</h3>
                    <p class="text-gray-600">
                        Jl. Soekarno Hatta, Pekanbaru, Riau 28111, Indonesia
                    </p>
                </div>

                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-8 rounded-2xl text-center" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="bg-blue-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-phone text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Telepon</h3>
                    <p class="text-gray-600">
                        +62 823-9001-7777 (WhatsApp)
                    </p>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-8 rounded-2xl text-center" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="bg-purple-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-envelope text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Email</h3>
                    <p class="text-gray-600">
                        info@riaufoodlestari.com
                    </p>
                </div>
            </div>

            <!-- Map -->
            <div class="rounded-2xl overflow-hidden shadow-xl mt-8" data-aos="zoom-in">
                <iframe width="100%" height="500" frameborder="0" style="border:0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.5!2d101.4384!3d0.5036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d58da1c1c1c1c1%3A0xc1c1c1c1c1c1c1c1!2sKantor%20RLF%20Admin%20-%20PT%20Riau%20Food%20Lestari!5e0!3m2!1sid!2sid!4v1702684800000" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <!-- Contact Details -->
            <div class="mt-12 bg-white rounded-2xl shadow-lg p-10">
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-2xl font-bold mb-6 text-gray-800">Jam Operasional</h3>
                        <div class="space-y-3 text-gray-600">
                            <div class="flex justify-between">
                                <span class="font-semibold">Senin - Sabtu:</span>
                                <span>08:30 - 17:00 WIB</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-semibold">Minggu & Hari Libur:</span>
                                <span>Tutup</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-2xl font-bold mb-6 text-gray-800">Hubungi Kami</h3>
                        <p class="text-gray-600 mb-6">
                            Untuk informasi lebih lanjut, silakan hubungi kami melalui salah satu kontak di bawah ini:
                        </p>
                        <div class="flex gap-4">
                            <a href="https://wa.me/6282390017777" target="_blank"
                                class="bg-gradient-to-r from-green-400 to-green-600 text-white px-6 py-3 rounded-full font-semibold hover:from-green-500 hover:to-green-700 transition inline-flex items-center">
                                <i class="fab fa-whatsapp mr-2"></i> WhatsApp
                            </a>
                            <a href="mailto:info@riaufoodlestari.com"
                                class="bg-gradient-to-r from-orange-500 to-red-600 text-white px-6 py-3 rounded-full font-semibold hover:from-orange-600 hover:to-red-700 transition inline-flex items-center">
                                <i class="fas fa-envelope mr-2"></i> Email
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
    </style>
@endpush