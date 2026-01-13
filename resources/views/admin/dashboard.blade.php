@extends('admin.layout')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Selamat datang di admin panel PT Riau Food Lestari')

@section('content')
    <!-- Welcome Card -->
    <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg p-6 mb-6 text-white" data-aos="fade-down">
        <h2 class="text-2xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
        <p class="text-orange-100">Ini adalah dashboard admin PT Riau Food Lestari</p>
    </div>

    <!-- Stats Cards - 4 Cards Only -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Total Produk -->
        <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Total Produk</p>
                    <h3 class="text-3xl font-bold text-gray-800">{{ $stats['products'] }}</h3>
                </div>
                <div class="w-14 h-14 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-box text-blue-600 text-2xl"></i>
                </div>
            </div>
            <a href="{{ route('admin.products.index') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium flex items-center">
                <span>Lihat Semua</span>
                <i class="fas fa-arrow-right ml-2 text-xs"></i>
            </a>
        </div>

        <!-- Total Artikel Blog -->
        <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="200">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Total Artikel</p>
                    <h3 class="text-3xl font-bold text-gray-800">{{ $stats['blog_posts'] }}</h3>
                </div>
                <div class="w-14 h-14 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-blog text-purple-600 text-2xl"></i>
                </div>
            </div>
            <a href="{{ route('admin.blog.posts') }}" class="text-sm text-purple-600 hover:text-purple-700 font-medium flex items-center">
                <span>Lihat Semua</span>
                <i class="fas fa-arrow-right ml-2 text-xs"></i>
            </a>
        </div>

        <!-- Lamaran Masuk -->
        <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="300">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Lamaran Masuk</p>
                    <h3 class="text-3xl font-bold text-gray-800">{{ $stats['applications'] }}</h3>
                </div>
                <div class="w-14 h-14 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-envelope text-green-600 text-2xl"></i>
                </div>
            </div>
            <a href="{{ route('admin.career.applications') }}" class="text-sm text-green-600 hover:text-green-700 font-medium flex items-center">
                <span>Lihat Semua</span>
                <i class="fas fa-arrow-right ml-2 text-xs"></i>
            </a>
        </div>

        <!-- Total Pengunjung -->
        <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="400">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Pengunjung</p>
                    <h3 class="text-3xl font-bold text-gray-800">{{ number_format($stats['visitors']) }}</h3>
                </div>
                <div class="w-14 h-14 bg-orange-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-orange-600 text-2xl"></i>
                </div>
            </div>
            <p class="text-xs text-gray-500">
                <i class="fas fa-info-circle mr-1"></i>
                Data akan tersedia setelah integrasi analytics
            </p>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="bg-white rounded-lg shadow" data-aos="fade-up">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Aktivitas Terbaru</h3>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                @forelse($recent_activities as $activity)
                    <div class="flex items-start space-x-4" data-aos="fade-left" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="w-10 h-10 bg-{{ $activity['color'] }}-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-{{ $activity['icon'] }} text-{{ $activity['color'] }}-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">{{ $activity['title'] }}</p>
                            <p class="text-xs text-gray-500">{{ $activity['subtitle'] }} - {{ $activity['time'] }}</p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12 text-gray-500">
                        <i class="fas fa-inbox text-5xl mb-4 opacity-30"></i>
                        <p class="text-sm">Belum ada aktivitas terbaru</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection