@extends('layouts.app')

@section('title', 'Karir - PT. Riau Food Lestari')

@section('content')

    <!-- Success/Error Alert -->
    @if(session('success'))
        <div class="fixed top-4 right-4 z-50 bg-green-500 text-white px-6 py-4 rounded-lg shadow-xl animate-fade-in-down"
            id="successAlert">
            <div class="flex items-center gap-3">
                <i class="fas fa-check-circle text-2xl"></i>
                <div>
                    <p class="font-bold">Berhasil!</p>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="fixed top-4 right-4 z-50 bg-red-500 text-white px-6 py-4 rounded-lg shadow-xl animate-fade-in-down"
            id="errorAlert">
            <div class="flex items-center gap-3">
                <i class="fas fa-exclamation-circle text-2xl"></i>
                <div>
                    <p class="font-bold">Error!</p>
                    <p>{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

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
                <!-- Benefit Cards (keep existing) -->
                <div class="group relative" data-aos="fade-up" data-aos-delay="0">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl blur-xl opacity-0 group-hover:opacity-20 transition-opacity"></div>
                    <div class="relative bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-2xl text-center border-2 border-blue-100 hover:border-blue-300 transition-all hover:shadow-xl h-full">
                        <div class="bg-gradient-to-br from-blue-500 to-indigo-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fas fa-chart-line text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-black mb-3 text-gray-900">Jenjang Karir</h3>
                        <p class="text-gray-600">Peluang pengembangan karir yang jelas dan terstruktur</p>
                    </div>
                </div>

                <div class="group relative" data-aos="fade-up" data-aos-delay="100">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl blur-xl opacity-0 group-hover:opacity-20 transition-opacity"></div>
                    <div class="relative bg-gradient-to-br from-green-50 to-teal-50 p-8 rounded-2xl text-center border-2 border-green-100 hover:border-green-300 transition-all hover:shadow-xl h-full">
                        <div class="bg-gradient-to-br from-green-500 to-teal-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fas fa-graduation-cap text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-black mb-3 text-gray-900">Pelatihan</h3>
                        <p class="text-gray-600">Program pelatihan dan pengembangan keterampilan rutin</p>
                    </div>
                </div>

                <div class="group relative" data-aos="fade-up" data-aos-delay="200">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl blur-xl opacity-0 group-hover:opacity-20 transition-opacity"></div>
                    <div class="relative bg-gradient-to-br from-purple-50 to-pink-50 p-8 rounded-2xl text-center border-2 border-purple-100 hover:border-purple-300 transition-all hover:shadow-xl h-full">
                        <div class="bg-gradient-to-br from-purple-500 to-pink-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fas fa-users text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-black mb-3 text-gray-900">Tim Solid</h3>
                        <p class="text-gray-600">Lingkungan kerja yang kolaboratif dan suportif</p>
                    </div>
                </div>

                <div class="group relative" data-aos="fade-up" data-aos-delay="300">
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl blur-xl opacity-0 group-hover:opacity-20 transition-opacity"></div>
                    <div class="relative bg-gradient-to-br from-orange-50 to-red-50 p-8 rounded-2xl text-center border-2 border-orange-100 hover:border-orange-300 transition-all hover:shadow-xl h-full">
                        <div class="bg-gradient-to-br from-orange-500 to-red-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fas fa-gift text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-black mb-3 text-gray-900">Benefit</h3>
                        <p class="text-gray-600">Gaji kompetitif dan tunjangan menarik</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Job Openings Section (Dynamic from Database) -->
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
                @forelse($jobs as $index => $job)
                    <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="absolute inset-0 rounded-2xl blur-xl opacity-0 group-hover:opacity-10 transition-opacity"
                            style="background: {{ $job->color }}"></div>
                        <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-gray-100 hover:border-orange-200 overflow-hidden">
                            <div class="p-8">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                                    <div class="flex-1">
                                        <div class="flex items-start gap-4 mb-4">
                                            <div class="w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg"
                                                style="background: {{ $job->color }}">
                                                <i class="{{ $job->icon }} text-white text-xl"></i>
                                            </div>
                                            <div>
                                                <h3 class="text-2xl font-black text-gray-900 mb-2">{{ $job->title }}</h3>
                                                <div class="flex flex-wrap gap-3">
                                                    <span class="inline-flex items-center gap-2 bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-semibold">
                                                        <i class="fas fa-briefcase text-xs"></i>{{ $job->type_label }}
                                                    </span>
                                                    <span class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">
                                                        <i class="fas fa-map-marker-alt text-xs"></i>{{ $job->location }}
                                                    </span>
                                                    @if($job->salary_range)
                                                        <span class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                                                            <i class="fas fa-money-bill-wave text-xs"></i>{{ $job->salary_range }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-gray-600 mb-4 leading-relaxed">
                                            {{ Str::limit($job->description, 150) }}
                                        </p>
                                        @if($job->skills && count($job->skills) > 0)
                                            <div class="flex flex-wrap gap-2">
                                                @foreach(array_slice($job->skills, 0, 4) as $skill)
                                                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">{{ $skill }}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-shrink-0">
                                        <button onclick="openApplicationModal({{ $job->id }}, '{{ $job->title }}')"
                                            class="inline-flex items-center gap-2 text-white px-6 py-3 rounded-xl font-bold transition-all shadow-lg hover:shadow-xl hover:scale-105"
                                            style="background: linear-gradient(135deg, {{ $job->color }} 0%, {{ $job->color }}dd 100%)">
                                            Lamar Sekarang
                                            <i class="fas fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12 bg-white rounded-2xl shadow-lg">
                        <i class="fas fa-briefcase text-6xl text-gray-300 mb-4"></i>
                        <h3 class="text-2xl font-bold text-gray-700 mb-2">Tidak Ada Lowongan Saat Ini</h3>
                        <p class="text-gray-500">Silakan cek kembali nanti atau kirimkan CV Anda ke email kami</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Application Modal -->
    <div id="applicationModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-3xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto" data-aos="zoom-in">
            <div class="sticky top-0 bg-gradient-to-r from-orange-500 to-red-600 text-white p-6 rounded-t-3xl">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-2xl font-black">Lamar Pekerjaan</h3>
                        <p id="modalJobTitle" class="text-orange-100 mt-1"></p>
                    </div>
                    <button onclick="closeApplicationModal()" class="text-white hover:text-gray-200 transition">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>
            </div>

            <form action="{{ route('career.apply') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                <input type="hidden" name="job_id" id="modalJobId">

                <div class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-800 font-bold mb-2">Nama Lengkap *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-orange-500 focus:outline-none transition">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-gray-800 font-bold mb-2">Email *</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-orange-500 focus:outline-none transition">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-800 font-bold mb-2">No. Telepon *</label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" required
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-orange-500 focus:outline-none transition">
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-800 font-bold mb-2">Pesan / Motivasi</label>
                        <textarea name="message" rows="4"
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-orange-500 focus:outline-none transition"
                            placeholder="Ceritakan tentang diri Anda dan motivasi melamar posisi ini...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-800 font-bold mb-2">Upload CV (PDF/DOC) * <span class="text-sm font-normal text-gray-500">(Max: 5MB)</span></label>
                        <input type="file" name="cv" accept=".pdf,.doc,.docx" required
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-orange-500 focus:outline-none transition">
                        @error('cv')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <button type="submit"
                            class="flex-1 bg-gradient-to-r from-orange-500 to-red-600 text-white px-8 py-4 rounded-xl font-bold hover:from-orange-600 hover:to-red-700 transition-all shadow-lg hover:shadow-xl">
                            <i class="fas fa-paper-plane mr-2"></i>Kirim Lamaran
                        </button>
                        <button type="button" onclick="closeApplicationModal()"
                            class="flex-1 bg-gray-200 text-gray-800 px-8 py-4 rounded-xl font-bold hover:bg-gray-300 transition-all">
                            Batal
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

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

        .animate-fade-in-down {
            animation: fadeInDown 0.5s ease-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        function openApplicationModal(jobId, jobTitle) {
            document.getElementById('modalJobId').value = jobId;
            document.getElementById('modalJobTitle').textContent = jobTitle;
            document.getElementById('applicationModal').classList.remove('hidden');
            document.getElementById('applicationModal').classList.add('flex');
        }

        function closeApplicationModal() {
            document.getElementById('applicationModal').classList.add('hidden');
            document.getElementById('applicationModal').classList.remove('flex');
        }

        // Auto hide alerts after 5 seconds
        setTimeout(() => {
            const successAlert = document.getElementById('successAlert');
            const errorAlert = document.getElementById('errorAlert');
            if (successAlert) successAlert.style.display = 'none';
            if (errorAlert) errorAlert.style.display = 'none';
        }, 5000);

        // Show modal if there are validation errors
        @if($errors->any())
            // Get the first job ID or use a default
            const firstJobId = {{ $jobs->first()->id ?? 0 }};
            const firstJobTitle = '{{ $jobs->first()->title ?? "" }}';
            if (firstJobId) {
                openApplicationModal(firstJobId, firstJobTitle);
            }
        @endif
    </script>
@endpush