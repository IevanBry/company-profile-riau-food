@extends('layouts.app')

@section('title', 'Perusahaan - PT. Riau Food Lestari')

@section('content')

    <!-- Page Header -->
    <section class="hero-gradient text-white py-20 md:py-32 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-72 h-72 bg-white rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-white rounded-full blur-3xl animate-pulse"
                style="animation-delay: 2s;"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10 text-center">
            <div class="inline-block bg-white/20 backdrop-blur-md text-white px-6 py-3 rounded-full mb-6"
                data-aos="fade-up">
                <span class="font-semibold text-sm"><i class="fas fa-building mr-2"></i>TENTANG KAMI</span>
            </div>
            <h1 class="text-5xl md:text-6xl font-black mb-6" data-aos="fade-up" data-aos-delay="100">
                Tentang Perusahaan Kami
            </h1>
            <p class="text-xl md:text-2xl text-orange-100 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                Mengenal lebih dekat PT. Riau Food Lestari
            </p>
        </div>
    </section>

    <!-- About Company Section -->
    <section class="py-20 md:py-32 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-12 lg:gap-16">
                <div class="md:w-1/2" data-aos="fade-right">
                    <div class="relative">
                        <div
                            class="absolute -inset-4 bg-gradient-to-br from-orange-400 to-red-500 rounded-3xl blur-2xl opacity-20">
                        </div>
                        <img src="{{ $company->image ? asset('storage/' . $company->image) : 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=800' }}"
                            alt="Perusahaan" class="relative rounded-3xl shadow-2xl w-full">
                    </div>
                </div>

                <div class="md:w-1/2" data-aos="fade-left">
                    <div class="inline-block bg-orange-100 text-orange-700 px-5 py-2.5 rounded-full mb-6">
                        <span class="font-bold text-sm tracking-wider">PROFIL PERUSAHAAN</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-black mb-6 text-gray-900 leading-tight">
                        PT. Riau Food <span class="text-gradient">Lestari</span>
                    </h2>
                    <div class="space-y-5 text-gray-600 text-lg leading-relaxed">
                        <p>{{ $company->description_1 }}</p>
                        <p>{{ $company->description_2 }}</p>
                        <p>{{ $company->description_3 }}</p>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-4 mt-10">
                        <div
                            class="text-center bg-gradient-to-br from-orange-50 to-red-50 p-5 rounded-2xl border-2 border-orange-100 hover:border-orange-300 transition-all hover:shadow-lg">
                            <div class="text-4xl font-black text-orange-600 mb-1">{{ $company->years_established }}</div>
                            <div class="text-sm font-semibold text-gray-700">Tahun Berdiri</div>
                        </div>
                        <div
                            class="text-center bg-gradient-to-br from-blue-50 to-indigo-50 p-5 rounded-2xl border-2 border-blue-100 hover:border-blue-300 transition-all hover:shadow-lg">
                            <div class="text-4xl font-black text-blue-600 mb-1">{{ $company->total_products }}</div>
                            <div class="text-sm font-semibold text-gray-700">Produk</div>
                        </div>
                        <div
                            class="text-center bg-gradient-to-br from-green-50 to-teal-50 p-5 rounded-2xl border-2 border-green-100 hover:border-green-300 transition-all hover:shadow-lg">
                            <div class="text-4xl font-black text-green-600 mb-1">{{ $company->original_guarantee }}</div>
                            <div class="text-sm font-semibold text-gray-700">Original</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission Section -->
    <section class="py-20 md:py-32 bg-gradient-to-br from-gray-50 to-orange-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-block mb-4">
                    <span class="text-orange-600 font-bold text-sm tracking-wider uppercase">Visi & Misi</span>
                    <div class="h-1 w-16 bg-gradient-to-r from-orange-500 to-red-500 mx-auto mt-2 rounded-full"></div>
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900">
                    Visi & Misi <span class="text-gradient">Kami</span>
                </h2>
            </div>

            <div class="grid md:grid-cols-2 gap-8 lg:gap-12 max-w-6xl mx-auto">
                <!-- Vision Card -->
                <div class="group relative" data-aos="fade-right">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-3xl blur-xl opacity-0 group-hover:opacity-20 transition-opacity duration-500">
                    </div>
                    <div
                        class="relative bg-white rounded-3xl shadow-xl p-10 hover:shadow-2xl transition-all duration-500 border-2 border-gray-100 hover:border-blue-200 h-full">
                        <div class="flex items-start gap-5 mb-6">
                            <div
                                class="bg-gradient-to-br from-blue-500 to-indigo-600 w-20 h-20 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-eye text-white text-3xl"></i>
                            </div>
                            <div>
                                <h3 class="text-3xl font-black text-gray-900">Visi</h3>
                                <div class="h-1 w-12 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full mt-2"></div>
                            </div>
                        </div>

                        <p class="text-gray-600 text-lg leading-relaxed">{{ $company->vision }}</p>
                    </div>
                </div>

                <!-- Mission Card -->
                <div class="group relative" data-aos="fade-left">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-purple-500 to-pink-600 rounded-3xl blur-xl opacity-0 group-hover:opacity-20 transition-opacity duration-500">
                    </div>
                    <div
                        class="relative bg-white rounded-3xl shadow-xl p-10 hover:shadow-2xl transition-all duration-500 border-2 border-gray-100 hover:border-purple-200 h-full">
                        <div class="flex items-start gap-5 mb-6">
                            <div
                                class="bg-gradient-to-br from-purple-500 to-pink-600 w-20 h-20 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-bullseye text-white text-3xl"></i>
                            </div>
                            <div>
                                <h3 class="text-3xl font-black text-gray-900">Misi</h3>
                                <div class="h-1 w-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mt-2"></div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-start gap-3 group/item">
                                <div
                                    class="w-6 h-6 bg-gradient-to-br from-orange-500 to-red-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5 group-hover/item:scale-110 transition-transform">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                                <span class="text-gray-600 text-lg leading-relaxed">{{ $company->mission_1 }}</span>
                            </div>
                            <div class="flex items-start gap-3 group/item">
                                <div
                                    class="w-6 h-6 bg-gradient-to-br from-orange-500 to-red-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5 group-hover/item:scale-110 transition-transform">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                                <span class="text-gray-600 text-lg leading-relaxed">{{ $company->mission_2 }}</span>
                            </div>
                            <div class="flex items-start gap-3 group/item">
                                <div
                                    class="w-6 h-6 bg-gradient-to-br from-orange-500 to-red-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5 group-hover/item:scale-110 transition-transform">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                                <span class="text-gray-600 text-lg leading-relaxed">{{ $company->mission_3 }}</span>
                            </div>
                            <div class="flex items-start gap-3 group/item">
                                <div
                                    class="w-6 h-6 bg-gradient-to-br from-orange-500 to-red-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5 group-hover/item:scale-110 transition-transform">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                                <span class="text-gray-600 text-lg leading-relaxed">{{ $company->mission_4 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-20 md:py-32 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-block bg-orange-100 text-orange-700 px-5 py-2.5 rounded-full mb-6">
                    <span class="font-bold text-sm tracking-wider"><i class="fas fa-map-pin mr-2"></i>LOKASI KAMI</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-black mb-4 text-gray-900">
                    Temukan <span class="text-gradient">PT. Riau Food Lestari</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Kunjungi kantor kami di Pekanbaru, Riau
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6 lg:gap-8 mb-12">
                <!-- Contact Info Cards -->
                <div class="group relative" data-aos="fade-up" data-aos-delay="0">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl blur-xl opacity-0 group-hover:opacity-20 transition-opacity">
                    </div>
                    <div
                        class="relative bg-gradient-to-br from-orange-50 to-red-50 p-8 rounded-2xl text-center border-2 border-orange-100 hover:border-orange-300 transition-all hover:shadow-xl h-full flex flex-col justify-between">
                        <div>
                            <div
                                class="bg-gradient-to-br from-orange-500 to-red-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                                <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-black mb-3 text-gray-900">Alamat</h3>
                        </div>
                        <p class="text-gray-700 leading-relaxed">
                            {{ $company->address }}
                        </p>
                    </div>
                </div>

                <div class="group relative" data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl blur-xl opacity-0 group-hover:opacity-20 transition-opacity">
                    </div>
                    <div
                        class="relative bg-gradient-to-br from-blue-50 to-cyan-50 p-8 rounded-2xl text-center border-2 border-blue-100 hover:border-blue-300 transition-all hover:shadow-xl h-full flex flex-col justify-between">
                        <div>
                            <div
                                class="bg-gradient-to-br from-blue-500 to-cyan-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                                <i class="fas fa-phone text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-black mb-3 text-gray-900">Telepon</h3>
                        </div>
                        <div>
                            <a href="tel:{{ str_replace([' ', '-'], '', $company->phone) }}"
                                class="text-blue-600 hover:text-blue-800 font-bold text-lg transition-colors">
                                {{ $company->phone }}
                            </a>
                            <p class="text-gray-600 text-sm mt-1">(WhatsApp)</p>
                        </div>
                    </div>
                </div>

                <div class="group relative" data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl blur-xl opacity-0 group-hover:opacity-20 transition-opacity">
                    </div>
                    <div
                        class="relative bg-gradient-to-br from-purple-50 to-pink-50 p-8 rounded-2xl text-center border-2 border-purple-100 hover:border-purple-300 transition-all hover:shadow-xl h-full flex flex-col justify-between">
                        <div>
                            <div
                                class="bg-gradient-to-br from-purple-500 to-pink-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                                <i class="fas fa-envelope text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-black mb-3 text-gray-900">Email</h3>
                        </div>
                        <a href="mailto:{{ $company->email }}"
                            class="text-purple-600 hover:text-purple-800 font-bold text-lg transition-colors break-all">
                            {{ $company->email }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Map -->
            <div class="rounded-3xl overflow-hidden shadow-2xl mb-12" data-aos="zoom-in">
                <iframe src="{{ $company->map_url }}" width="100%" height="500" style="border:0;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <!-- Contact Details -->
            <div class="bg-gradient-to-br from-gray-50 to-orange-50 rounded-3xl shadow-xl p-10 lg:p-12 border-2 border-gray-100"
                data-aos="fade-up">
                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="text-3xl font-black mb-8 text-gray-900 flex items-center gap-3">
                            <i class="fas fa-clock text-orange-600"></i>
                            Jam Operasional
                        </h3>
                        <div class="space-y-4">
                            <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                                <div class="flex justify-between items-center">
                                    <span class="font-bold text-gray-800">Senin - Sabtu</span>
                                    <span class="text-orange-600 font-black">{{ $company->operating_hours }}</span>
                                </div>
                            </div>
                            <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                                <div class="flex justify-between items-center">
                                    <span class="font-bold text-gray-800">Minggu & Hari Libur</span>
                                    <span class="text-red-600 font-black">{{ $company->holiday_status }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-3xl font-black mb-6 text-gray-900">Hubungi Kami</h3>
                        <p class="text-gray-600 text-lg leading-relaxed mb-8">
                            Untuk informasi lebih lanjut tentang produk dan kerjasama, silakan hubungi kami melalui:
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="https://wa.me/{{ str_replace([' ', '-', '+'], '', $company->phone) }}" target="_blank"
                                class="group relative inline-flex items-center justify-center gap-3 bg-gradient-to-r from-green-500 to-green-600 text-white px-8 py-4 rounded-2xl font-bold text-lg overflow-hidden transition-all hover:shadow-2xl hover:scale-105">
                                <span
                                    class="absolute inset-0 bg-gradient-to-r from-green-400 to-green-500 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                                <i class="fab fa-whatsapp text-xl relative z-10"></i>
                                <span class="relative z-10">WhatsApp</span>
                            </a>
                            <a href="mailto:{{ $company->email }}"
                                class="group relative inline-flex items-center justify-center gap-3 bg-gradient-to-r from-orange-500 to-red-600 text-white px-8 py-4 rounded-2xl font-bold text-lg overflow-hidden transition-all hover:shadow-2xl hover:scale-105">
                                <span
                                    class="absolute inset-0 bg-gradient-to-r from-orange-400 to-red-500 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                                <i class="fas fa-envelope text-xl relative z-10"></i>
                                <span class="relative z-10">Email</span>
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
    </style>
@endpush