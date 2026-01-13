@extends('layouts.app')

@section('title', 'Blog & Artikel - PT. Riau Food Lestari')

@section('content')

    <!-- Hero Section -->
    <section class="relative py-32 overflow-hidden bg-gradient-to-br from-slate-900 via-orange-900 to-slate-900">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzRjMC0yLjIxLTEuNzktNC00LTRzLTQgMS43OS00IDQgMS43OSA0IDQgNCA0LTEuNzkgNC00eiIvPjwvZz48L2c+PC9zdmc+')] opacity-20"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md text-white px-5 py-2 rounded-full text-sm font-medium mb-6">
                    <i class="fas fa-book-open"></i>
                    <span>Blog & Knowledge Hub</span>
                </div>
                <h1 class="text-5xl md:text-7xl font-extrabold mb-6 text-white leading-tight">
                    Cerita, Tips & <br />
                    <span class="bg-gradient-to-r from-orange-400 to-yellow-300 bg-clip-text text-transparent">Inspirasi</span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-2xl mx-auto">
                    Temukan wawasan, panduan praktis, dan berita terkini seputar dunia distribusi dan produk berkualitas
                </p>
                <div class="flex flex-wrap gap-4 justify-center text-sm text-gray-300">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-pencil-alt text-orange-400"></i>
                        <span>{{ $posts->total() }} Artikel</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-folder text-orange-400"></i>
                        <span>{{ $categories->count() }} Kategori</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-clock text-orange-400"></i>
                        <span>Update Mingguan</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Category Pills -->
    <section class="py-6 bg-white sticky top-20 z-40 shadow-sm">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-3 overflow-x-auto pb-2 scrollbar-hide">
                <a href="{{ route('blog') }}"
                    class="filter-btn {{ !request('category') ? 'active' : '' }} whitespace-nowrap px-5 py-2 rounded-lg font-medium transition-all">
                    <i class="fas fa-th-large"></i> Semua
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('blog.category', $category->slug) }}"
                        class="filter-btn {{ request()->route('slug') == $category->slug ? 'active' : '' }} whitespace-nowrap px-5 py-2 rounded-lg font-medium transition-all">
                        @if($category->icon)
                            {{ $category->icon }}
                        @endif
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Article -->
    @if($featuredPost)
        <section class="py-12 bg-gradient-to-br from-orange-50 to-red-50">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto" data-aos="fade-up">
                    <div class="bg-white rounded-2xl overflow-hidden shadow-2xl">
                        <div class="grid md:grid-cols-2 gap-0">
                            <div class="relative h-64 md:h-auto">
                                @if($featuredPost->featured_image)
                                    <img src="{{ asset('storage/' . $featuredPost->featured_image) }}" 
                                        alt="{{ $featuredPost->title }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center">
                                        <i class="fas fa-star text-white text-6xl opacity-50"></i>
                                    </div>
                                @endif
                                <div class="absolute top-4 left-4">
                                    <span class="bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-xs font-bold">
                                        <i class="fas fa-star"></i> Featured
                                    </span>
                                </div>
                            </div>
                            <div class="p-8 md:p-12 flex flex-col justify-center">
                                <div class="inline-block bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-xs font-bold mb-4 w-fit">
                                    {{ $featuredPost->category->name }}
                                </div>
                                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 leading-tight">
                                    {{ $featuredPost->title }}
                                </h2>
                                <p class="text-gray-600 mb-6 line-clamp-3">
                                    {{ $featuredPost->excerpt }}
                                </p>
                                <div class="flex items-center justify-between mb-6 text-sm text-gray-500">
                                    <div class="flex items-center gap-4">
                                        <span class="flex items-center gap-1">
                                            <i class="far fa-calendar"></i>
                                            {{ $featuredPost->published_at->format('d M Y') }}
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <i class="far fa-clock"></i>
                                            {{ $featuredPost->reading_time ?? '5 min' }}
                                        </span>
                                    </div>
                                </div>
                                <a href="{{ route('blog.show', $featuredPost->slug) }}"
                                    class="inline-flex items-center justify-center bg-gradient-to-r from-orange-500 to-red-500 text-white px-8 py-3 rounded-lg hover:from-orange-600 hover:to-red-600 transition shadow-lg font-semibold">
                                    Baca Artikel <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Articles Grid -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="mb-12" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-3">
                    <div class="h-1 w-12 bg-gradient-to-r from-orange-500 to-red-500 rounded"></div>
                    <span class="text-sm font-bold text-orange-600 uppercase tracking-wider">
                        {{ request()->route('slug') ? 'Kategori: ' . $currentCategory->name : 'Latest Posts' }}
                    </span>
                </div>
                <h2 class="text-3xl font-bold text-gray-900">
                    {{ request()->route('slug') ? 'Artikel ' . $currentCategory->name : 'Artikel Terbaru' }}
                </h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($posts as $index => $post)
                    <article class="article-card group" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                        <div class="bg-white rounded-xl overflow-hidden hover:shadow-2xl transition-all duration-300">
                            <div class="relative h-56 overflow-hidden">
                                @if($post->featured_image)
                                    <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                        alt="{{ $post->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-orange-300 to-red-400 flex items-center justify-center">
                                        <i class="fas fa-newspaper text-white text-6xl opacity-50"></i>
                                    </div>
                                @endif
                                <div class="absolute top-4 left-4">
                                    <span class="inline-block bg-white/95 backdrop-blur-sm text-orange-600 text-xs font-bold px-3 py-1 rounded-md"
                                        style="background-color: {{ $post->category->color ?? '#fff' }}33">
                                        @if($post->category->icon)
                                            {{ $post->category->icon }}
                                        @endif
                                        {{ $post->category->name }}
                                    </span>
                                </div>
                                @if($post->is_featured)
                                    <div class="absolute top-4 right-4">
                                        <span class="inline-block bg-yellow-400 text-yellow-900 text-xs font-bold px-2 py-1 rounded-md">
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-3 text-xs text-gray-500 mb-3">
                                    <span class="flex items-center gap-1">
                                        <i class="far fa-calendar"></i>
                                        {{ $post->published_at->format('d M Y') }}
                                    </span>
                                    <span>•</span>
                                    <span class="flex items-center gap-1">
                                        <i class="far fa-clock"></i>
                                        {{ $post->reading_time ?? '5 min read' }}
                                    </span>
                                    @if($post->views_count > 0)
                                        <span>•</span>
                                        <span class="flex items-center gap-1">
                                            <i class="far fa-eye"></i>
                                            {{ number_format($post->views_count) }}
                                        </span>
                                    @endif
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-orange-600 transition">
                                    {{ $post->title }}
                                </h3>
                                <p class="text-gray-600 mb-4 line-clamp-3 text-sm leading-relaxed">
                                    {{ $post->excerpt }}
                                </p>
                                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center text-white text-xs font-bold">
                                            {{ substr($post->author->name, 0, 1) }}
                                        </div>
                                        <span class="text-sm font-medium text-gray-700">{{ $post->author->name }}</span>
                                    </div>
                                    <a href="{{ route('blog.show', $post->slug) }}"
                                        class="text-orange-600 hover:text-orange-700 font-medium text-sm group/link">
                                        Baca <i class="fas fa-chevron-right text-xs ml-1 group-hover/link:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full text-center py-20">
                        <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-100 rounded-full mb-6">
                            <i class="fas fa-newspaper text-4xl text-gray-300"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-700 mb-2">Belum Ada Artikel</h3>
                        <p class="text-gray-500 text-lg mb-6">
                            {{ request()->route('slug') ? 'Belum ada artikel dalam kategori ini' : 'Belum ada artikel yang dipublikasikan' }}
                        </p>
                        <a href="{{ route('blog') }}"
                            class="inline-flex items-center justify-center bg-gradient-to-r from-orange-500 to-red-500 text-white px-6 py-3 rounded-lg hover:from-orange-600 hover:to-red-600 transition shadow-lg font-semibold">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Semua Artikel
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($posts->hasPages())
                <div class="mt-12 flex justify-center">
                    <div class="flex items-center gap-2">
                        {{ $posts->links() }}
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-20 bg-gradient-to-br from-orange-500 via-red-500 to-pink-600 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzRjMC0yLjIxLTEuNzktNC00LTRzLTQgMS43OS00IDQgMS43OSA0IDQgNCA0LTEuNzkgNC00eiIvPjwvZz48L2c+PC9zdmc+')] opacity-20"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center text-white" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-md px-4 py-2 rounded-full text-sm font-medium mb-6">
                    <i class="fas fa-envelope-open"></i>
                    <span>Newsletter</span>
                </div>

                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    Jangan Lewatkan Update Terbaru
                </h2>

                <p class="text-lg md:text-xl text-white/90 mb-10">
                    Dapatkan artikel, tips, dan insight menarik langsung ke inbox Anda setiap minggu
                </p>

                <form class="max-w-xl mx-auto">
                    <div class="flex flex-col sm:flex-row gap-3 bg-white rounded-full p-2 shadow-2xl">
                        <input type="email" placeholder="alamat@email.com"
                            class="flex-1 px-6 py-3 rounded-full text-gray-800 font-medium focus:outline-none">
                        <button type="submit"
                            class="bg-gray-900 text-white px-8 py-3 rounded-full font-bold hover:bg-gray-800 transition whitespace-nowrap">
                            <i class="fas fa-paper-plane mr-2"></i> Subscribe
                        </button>
                    </div>
                    <p class="text-sm text-white/80 mt-4 flex items-center justify-center gap-2">
                        <i class="fas fa-shield-alt"></i>
                        <span>100% aman, tanpa spam</span>
                    </p>
                </form>

                <div class="grid grid-cols-3 gap-8 mt-16 max-w-2xl mx-auto">
                    <div class="text-center">
                        <div class="text-4xl font-bold mb-2">{{ $posts->total() }}</div>
                        <p class="text-white/80 text-sm">Artikel</p>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold mb-2">{{ $categories->count() }}</div>
                        <p class="text-white/80 text-sm">Kategori</p>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold mb-2">1K+</div>
                        <p class="text-white/80 text-sm">Pembaca</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <style>
        .filter-btn {
            background: #f3f4f6;
            color: #6b7280;
            text-decoration: none;
            display: inline-block;
        }

        .filter-btn:hover {
            background: #e5e7eb;
            color: #374151;
        }

        .filter-btn.active {
            background: linear-gradient(135deg, #f97316 0%, #dc2626 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);
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

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
@endpush