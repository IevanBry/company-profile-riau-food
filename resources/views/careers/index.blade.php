@extends('layouts.app')

@section('title', 'Karir - PT. Riau Food Lestari')

@section('content')

    <!-- Hero Section -->
    <section class="hero-gradient text-white py-20 md:py-32 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-72 h-72 bg-white rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-white rounded-full blur-3xl animate-pulse"
                style="animation-delay: 2s;"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10 text-center">
            <div class="inline-block bg-white/20 backdrop-blur-md text-white px-6 py-3 rounded-full mb-6"
                data-aos="fade-up">
                <span class="font-semibold text-sm"><i class="fas fa-briefcase mr-2"></i>KARIR</span>
            </div>
            <h1 class="text-5xl md:text-6xl font-black mb-6" data-aos="fade-up" data-aos-delay="100">
                Bergabung Bersama Kami
            </h1>
            <p class="text-xl md:text-2xl text-orange-100 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                Mulai karir impian Anda dan kembangkan potensi bersama PT. Riau Food Lestari
            </p>
        </div>
    </section>

    <!-- Why Join Us Section -->
    <section class="py-20 md:py-32 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-block mb-4">
                    <span class="text-orange-600 font-bold text-sm tracking-wider uppercase">Kenapa Bergabung</span>
                    <div class="h-1 w-16 bg-gradient-to-r from-orange-500 to-red-500 mx-auto mt-2 rounded-full"></div>
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">
                    Mengapa Bekerja <span class="text-gradient">Di Sini?</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Kami menawarkan lingkungan kerja yang dinamis dan peluang pengembangan karir yang cemerlang
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                <!-- Benefit Card 1 -->
                <div class="group relative" data-aos="fade-up" data-aos-delay="0">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl blur-xl opacity-0 group-hover:opacity-20 transition-opacity">
                    </div>
                    <div
                        class="relative bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-2xl text-center border-2 border-blue-100 hover:border-blue-300 transition-all hover:shadow-xl h-full">
                        <div
                            class="bg-gradient-to-br from-blue-500 to-indigo-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fas fa-chart-line text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-black mb-3 text-gray-900">Jenjang Karir</h3>
                        <p class="text-gray-600">Peluang pengembangan karir yang jelas dan terstruktur</p>
                    </div>
                </div>

                <!-- Benefit Card 2 -->
                <div class="group relative" data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl blur-xl opacity-0 group-hover:opacity-20 transition-opacity">
                    </div>
                    <div
                        class="relative bg-gradient-to-br from-green-50 to-teal-50 p-8 rounded-2xl text-center border-2 border-green-100 hover:border-green-300 transition-all hover:shadow-xl h-full">
                        <div
                            class="bg-gradient-to-br from-green-500 to-teal-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fas fa-graduation-cap text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-black mb-3 text-gray-900">Pelatihan</h3>
                        <p class="text-gray-600">Program pelatihan dan pengembangan keterampilan rutin</p>
                    </div>
                </div>

                <!-- Benefit Card 3 -->
                <div class="group relative" data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl blur-xl opacity-0 group-hover:opacity-20 transition-opacity">
                    </div>
                    <div
                        class="relative bg-gradient-to-br from-purple-50 to-pink-50 p-8 rounded-2xl text-center border-2 border-purple-100 hover:border-purple-300 transition-all hover:shadow-xl h-full">
                        <div
                            class="bg-gradient-to-br from-purple-500 to-pink-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fas fa-users text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-black mb-3 text-gray-900">Tim Solid</h3>
                        <p class="text-gray-600">Lingkungan kerja yang kolaboratif dan suportif</p>
                    </div>
                </div>

                <!-- Benefit Card 4 -->
                <div class="group relative" data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl blur-xl opacity-0 group-hover:opacity-20 transition-opacity">
                    </div>
                    <div
                        class="relative bg-gradient-to-br from-orange-50 to-red-50 p-8 rounded-2xl text-center border-2 border-orange-100 hover:border-orange-300 transition-all hover:shadow-xl h-full">
                        <div
                            class="bg-gradient-to-br from-orange-500 to-red-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fas fa-gift text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-black mb-3 text-gray-900">Benefit</h3>
                        <p class="text-gray-600">Gaji kompetitif dan tunjangan menarik</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Job Openings Section -->
    <section class="py-20 md:py-32 bg-gradient-to-br from-gray-50 to-orange-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-block mb-4">
                    <span class="text-orange-600 font-bold text-sm tracking-wider uppercase">Lowongan Tersedia</span>
                    <div class="h-1 w-16 bg-gradient-to-r from-orange-500 to-red-500 mx-auto mt-2 rounded-full"></div>
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">
                    Posisi yang <span class="text-gradient">Dibuka</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Temukan posisi yang sesuai dengan keahlian dan minat Anda
                </p>
            </div>

            <div class="max-w-5xl mx-auto space-y-6">
                <!-- Job Card 1 -->
                <div class="group relative" data-aos="fade-up" data-aos-delay="0">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl blur-xl opacity-0 group-hover:opacity-10 transition-opacity">
                    </div>
                    <div
                        class="relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-gray-100 hover:border-orange-200 overflow-hidden">
                        <div class="p-8">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                                <div class="flex-1">
                                    <div class="flex items-start gap-4 mb-4">
                                        <div
                                            class="bg-gradient-to-br from-orange-500 to-red-600 w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                            <i class="fas fa-truck text-white text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-2xl font-black text-gray-900 mb-2">Staff Gudang</h3>
                                            <div class="flex flex-wrap gap-3">
                                                <span
                                                    class="inline-flex items-center gap-2 bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-semibold">
                                                    <i class="fas fa-briefcase text-xs"></i>Full Time
                                                </span>
                                                <span
                                                    class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">
                                                    <i class="fas fa-map-marker-alt text-xs"></i>Pekanbaru
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 mb-4 leading-relaxed">
                                        Mengelola stok barang, melakukan penerimaan dan pengeluaran barang, serta memastikan
                                        sistem inventory berjalan dengan baik.
                                    </p>
                                    <div class="flex flex-wrap gap-2">
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">Inventory
                                            Management</span>
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">Logistik</span>
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">Teliti</span>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="#apply"
                                        class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-red-600 text-white px-6 py-3 rounded-xl font-bold hover:from-orange-600 hover:to-red-700 transition-all shadow-lg hover:shadow-xl hover:scale-105">
                                        Lamar Sekarang
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Card 2 -->
                <div class="group relative" data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl blur-xl opacity-0 group-hover:opacity-10 transition-opacity">
                    </div>
                    <div
                        class="relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-gray-100 hover:border-blue-200 overflow-hidden">
                        <div class="p-8">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                                <div class="flex-1">
                                    <div class="flex items-start gap-4 mb-4">
                                        <div
                                            class="bg-gradient-to-br from-blue-500 to-indigo-600 w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                            <i class="fas fa-user-tie text-white text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-2xl font-black text-gray-900 mb-2">Sales Marketing</h3>
                                            <div class="flex flex-wrap gap-3">
                                                <span
                                                    class="inline-flex items-center gap-2 bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-semibold">
                                                    <i class="fas fa-briefcase text-xs"></i>Full Time
                                                </span>
                                                <span
                                                    class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">
                                                    <i class="fas fa-map-marker-alt text-xs"></i>Pekanbaru
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 mb-4 leading-relaxed">
                                        Bertanggung jawab dalam pengembangan pasar, mencari klien baru, dan membangun
                                        hubungan jangka panjang dengan pelanggan.
                                    </p>
                                    <div class="flex flex-wrap gap-2">
                                        <span
                                            class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">Komunikasi</span>
                                        <span
                                            class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">Negosiasi</span>
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">Target
                                            Oriented</span>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="#apply"
                                        class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-xl font-bold hover:from-blue-600 hover:to-indigo-700 transition-all shadow-lg hover:shadow-xl hover:scale-105">
                                        Lamar Sekarang
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Card 3 -->
                <div class="group relative" data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl blur-xl opacity-0 group-hover:opacity-10 transition-opacity">
                    </div>
                    <div
                        class="relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-gray-100 hover:border-green-200 overflow-hidden">
                        <div class="p-8">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                                <div class="flex-1">
                                    <div class="flex items-start gap-4 mb-4">
                                        <div
                                            class="bg-gradient-to-br from-green-500 to-teal-600 w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                            <i class="fas fa-calculator text-white text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-2xl font-black text-gray-900 mb-2">Staff Administrasi</h3>
                                            <div class="flex flex-wrap gap-3">
                                                <span
                                                    class="inline-flex items-center gap-2 bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-semibold">
                                                    <i class="fas fa-briefcase text-xs"></i>Full Time
                                                </span>
                                                <span
                                                    class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">
                                                    <i class="fas fa-map-marker-alt text-xs"></i>Pekanbaru
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 mb-4 leading-relaxed">
                                        Menangani administrasi perusahaan, pengarsipan dokumen, entry data, dan mendukung
                                        operasional harian kantor.
                                    </p>
                                    <div class="flex flex-wrap gap-2">
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">MS
                                            Office</span>
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">Data
                                            Entry</span>
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">Detail
                                            Oriented</span>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="#apply"
                                        class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-teal-600 text-white px-6 py-3 rounded-xl font-bold hover:from-green-600 hover:to-teal-700 transition-all shadow-lg hover:shadow-xl hover:scale-105">
                                        Lamar Sekarang
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Card 4 -->
                <div class="group relative" data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl blur-xl opacity-0 group-hover:opacity-10 transition-opacity">
                    </div>
                    <div
                        class="relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-gray-100 hover:border-purple-200 overflow-hidden">
                        <div class="p-8">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                                <div class="flex-1">
                                    <div class="flex items-start gap-4 mb-4">
                                        <div
                                            class="bg-gradient-to-br from-purple-500 to-pink-600 w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                            <i class="fas fa-shipping-fast text-white text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-2xl font-black text-gray-900 mb-2">Supir / Driver</h3>
                                            <div class="flex flex-wrap gap-3">
                                                <span
                                                    class="inline-flex items-center gap-2 bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-semibold">
                                                    <i class="fas fa-briefcase text-xs"></i>Full Time
                                                </span>
                                                <span
                                                    class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">
                                                    <i class="fas fa-map-marker-alt text-xs"></i>Pekanbaru
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 mb-4 leading-relaxed">
                                        Mengantar produk ke lokasi pelanggan dengan aman dan tepat waktu. Memiliki SIM B1
                                        dan pengalaman mengemudi.
                                    </p>
                                    <div class="flex flex-wrap gap-2">
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">SIM B1</span>
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">Bertanggung
                                            Jawab</span>
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">Jujur</span>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="#apply"
                                        class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-500 to-pink-600 text-white px-6 py-3 rounded-xl font-bold hover:from-purple-600 hover:to-pink-700 transition-all shadow-lg hover:shadow-xl hover:scale-105">
                                        Lamar Sekarang
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Form Section -->
    <section id="apply" class="py-20 md:py-32 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16" data-aos="fade-up">
                    <div class="inline-block mb-4">
                        <span class="text-orange-600 font-bold text-sm tracking-wider uppercase">Kirim Lamaran</span>
                        <div class="h-1 w-16 bg-gradient-to-r from-orange-500 to-red-500 mx-auto mt-2 rounded-full"></div>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">
                        Lamar <span class="text-gradient">Sekarang</span>
                    </h2>
                    <p class="text-xl text-gray-600">
                        Isi formulir di bawah ini atau kirimkan CV Anda langsung via WhatsApp
                    </p>
                </div>

                <div class="bg-gradient-to-br from-gray-50 to-orange-50 rounded-3xl shadow-xl p-8 lg:p-12 border-2 border-gray-100"
                    data-aos="fade-up" data-aos-delay="100">
                    <form action="#" method="POST" class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-800 font-bold mb-2">Nama Lengkap *</label>
                                <input type="text" name="name" required
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-orange-500 focus:outline-none transition">
                            </div>
                            <div>
                                <label class="block text-gray-800 font-bold mb-2">Email *</label>
                                <input type="email" name="email" required
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-orange-500 focus:outline-none transition">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-800 font-bold mb-2">No. Telepon *</label>
                                <input type="tel" name="phone" required
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-orange-500 focus:outline-none transition">
                            </div>
                            <div>
                                <label class="block text-gray-800 font-bold mb-2">Posisi yang Dilamar *</label>
                                <select name="position" required
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-orange-500 focus:outline-none transition">
                                    <option value="">Pilih Posisi</option>
                                    <option value="staff-gudang">Staff Gudang</option>
                                    <option value="sales-marketing">Sales Marketing</option>
                                    <option value="staff-administrasi">Staff Administrasi</option>
                                    <option value="supir">Supir / Driver</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-800 font-bold mb-2">Pesan / Motivasi</label>
                            <textarea name="message" rows="5"
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-orange-500 focus:outline-none transition"
                                placeholder="Ceritakan tentang diri Anda dan motivasi melamar posisi ini..."></textarea>
                        </div>

                        <div>
                            <label class="block text-gray-800 font-bold mb-2">Upload CV (PDF/DOC) *</label>
                            <input type="file" name="cv" accept=".pdf,.doc,.docx" required
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-orange-500 focus:outline-none transition">
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <button type="submit"
                                class="flex-1 bg-gradient-to-r from-orange-500 to-red-600 text-white px-8 py-4 rounded-xl font-bold hover:from-orange-600 hover:to-red-700 transition-all shadow-lg hover:shadow-xl hover:scale-105">
                                <i class="fas fa-paper-plane mr-2"></i>Kirim Lamaran
                            </button>
                            <a href="https://wa.me/6282390017777?text=Halo,%20saya%20tertarik%20untuk%20melamar%20pekerjaan%20di%20PT%20Riau%20Food%20Lestari"
                                target="_blank"
                                class="flex-1 bg-gradient-to-r from-green-500 to-green-600 text-white px-8 py-4 rounded-xl font-bold hover:from-green-600 hover:to-green-700 transition-all shadow-lg hover:shadow-xl hover:scale-105 text-center">
                                <i class="fab fa-whatsapp mr-2"></i>Lamar via WhatsApp
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="mt-12 text-center" data-aos="fade-up" data-aos-delay="200">
                    <p class="text-gray-600 mb-4">Atau hubungi tim HR kami:</p>
                    <div class="flex flex-wrap justify-center gap-6">
                        <a href="tel:6282390017777"
                            class="inline-flex items-center gap-2 text-orange-600 hover:text-orange-700 font-bold">
                            <i class="fas fa-phone"></i>
                            +62 823-9001-7777
                        </a>
                        <a href="mailto:hr@riaufoodlestari.com"
                            class="inline-flex items-center gap-2 text-orange-600 hover:text-orange-700 font-bold">
                            <i class="fas fa-envelope"></i>
                            hr@riaufoodlestari.com
                        </a>
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

        html {
            scroll-behavior: smooth;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 0.1;
            }

            50% {
                opacity: 0.15;
            }
        }

        .animate-pulse {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* Custom file input styling */
        input[type="file"]::file-selector-button {
            background: linear-gradient(135deg, #F97316 0%, #DC2626 100%);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            margin-right: 1rem;
            transition: all 0.3s;
        }

        input[type="file"]::file-selector-button:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(249, 115, 22, 0.4);
        }
    </style>
@endpush