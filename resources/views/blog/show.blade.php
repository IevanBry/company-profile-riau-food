@extends('layouts.app')

@section('title', $post->title . ' - PT. Riau Food Lestari')

@section('content')

    <!-- Article Hero -->
    <section class="relative h-[600px] overflow-hidden">
        <div class="absolute inset-0">
            @if($post->featured_image)
                <img src="{{ asset('storage/' . $post->featured_image) }}" 
                    alt="{{ $post->title }}" 
                    class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gradient-to-br from-orange-400 to-red-500"></div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
        </div>

        <div class="container mx-auto px-4 h-full flex items-end relative z-10 pb-12">
            <div class="max-w-4xl" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    @if($post->category->icon)
                        {{ $post->category->icon }}
                    @endif
                    {{ $post->category->name }}
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
                    {{ $post->title }}
                </h1>
                <div class="flex flex-wrap items-center gap-6 text-white/90">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center mr-3">
                            <span class="text-white font-bold text-lg">
                                {{ substr($post->author->name, 0, 1) }}
                            </span>
                        </div>
                        <div>
                            <div class="font-semibold">{{ $post->author->name }}</div>
                            <div class="text-sm text-white/70">Author</div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-calendar mr-2 text-orange-400"></i>
                        {{ $post->published_at->format('d F Y') }}
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-clock mr-2 text-orange-400"></i>
                        {{ $post->reading_time ?? '5 min read' }}
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-eye mr-2 text-orange-400"></i>
                        {{ number_format($post->views_count) }} views
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">

                <!-- Share Buttons -->
                <div class="flex items-center justify-between mb-12 pb-6 border-b border-gray-200" data-aos="fade-up">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-600 mb-2">BAGIKAN ARTIKEL INI</h3>
                        <div class="flex gap-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}" 
                                target="_blank"
                                class="w-10 h-10 bg-blue-600 text-white rounded-lg flex items-center justify-center hover:bg-blue-700 transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post->slug)) }}&text={{ urlencode($post->title) }}" 
                                target="_blank"
                                class="w-10 h-10 bg-sky-500 text-white rounded-lg flex items-center justify-center hover:bg-sky-600 transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . route('blog.show', $post->slug)) }}" 
                                target="_blank"
                                class="w-10 h-10 bg-green-600 text-white rounded-lg flex items-center justify-center hover:bg-green-700 transition">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $post->slug)) }}" 
                                target="_blank"
                                class="w-10 h-10 bg-blue-700 text-white rounded-lg flex items-center justify-center hover:bg-blue-800 transition">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <button onclick="copyLink()"
                                class="w-10 h-10 bg-gray-600 text-white rounded-lg flex items-center justify-center hover:bg-gray-700 transition">
                                <i class="fas fa-link"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Article Excerpt -->
                <div class="bg-orange-50 border-l-4 border-orange-500 p-6 mb-8 rounded-r-lg" data-aos="fade-up">
                    <p class="text-lg text-gray-700 leading-relaxed">
                        {{ $post->excerpt }}
                    </p>
                </div>

                <!-- Article Body -->
                <article class="prose prose-lg max-w-none" data-aos="fade-up">
                    {!! nl2br(e($post->content)) !!}
                </article>

                <!-- Tags -->
                @if($post->tags && is_array($post->tags) && count($post->tags) > 0)
                    <div class="flex flex-wrap gap-3 mt-12 pt-8 border-t border-gray-200" data-aos="fade-up">
                        <span class="text-gray-600 font-semibold flex items-center">
                            <i class="fas fa-tags mr-2"></i> Tags:
                        </span>
                        @foreach($post->tags as $tag)
                            <span class="bg-gray-100 hover:bg-orange-100 text-gray-700 hover:text-orange-700 px-4 py-2 rounded-full text-sm transition">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                @endif

                <!-- Author Box -->
                <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-2xl p-8 mt-12" data-aos="fade-up">
                    <div class="flex items-start space-x-6">
                        <div class="w-24 h-24 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white text-3xl font-bold">
                                {{ substr($post->author->name, 0, 1) }}
                            </span>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-2xl font-bold text-gray-800 mb-2">{{ $post->author->name }}</h4>
                            <p class="text-gray-600 mb-4">
                                Content creator dan expert dalam industri distribusi produk. 
                                Berkomitmen untuk memberikan informasi terpercaya dan bermanfaat bagi pembaca.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Related Articles -->
    @if($relatedPosts->count() > 0)
        <section class="py-20 bg-gradient-to-br from-orange-50 to-red-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12" data-aos="fade-up">
                    <div class="flex items-center justify-center gap-3 mb-3">
                        <div class="h-1 w-12 bg-gradient-to-r from-orange-500 to-red-500 rounded"></div>
                        <span class="text-sm font-bold text-orange-600 uppercase tracking-wider">Related Content</span>
                        <div class="h-1 w-12 bg-gradient-to-r from-orange-500 to-red-500 rounded"></div>
                    </div>
                    <h2 class="text-4xl font-bold mb-4 text-gray-800">
                        Artikel Terkait
                    </h2>
                    <p class="text-gray-600 text-lg">Baca juga artikel menarik lainnya</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($relatedPosts as $i => $relatedPost)
                        <article class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2"
                            data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                            <div class="relative h-48 overflow-hidden">
                                @if($relatedPost->featured_image)
                                    <img src="{{ asset('storage/' . $relatedPost->featured_image) }}" 
                                        alt="{{ $relatedPost->title }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-orange-300 to-red-400 flex items-center justify-center">
                                        <i class="fas fa-newspaper text-white text-4xl opacity-50"></i>
                                    </div>
                                @endif
                                <div class="absolute top-4 left-4 bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ $relatedPost->category->name }}
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-3 text-xs text-gray-500 mb-3">
                                    <span class="flex items-center gap-1">
                                        <i class="far fa-calendar"></i>
                                        {{ $relatedPost->published_at->format('d M Y') }}
                                    </span>
                                    <span>•</span>
                                    <span class="flex items-center gap-1">
                                        <i class="far fa-clock"></i>
                                        {{ $relatedPost->reading_time ?? '5 min' }}
                                    </span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2 hover:text-orange-600 transition line-clamp-2">
                                    {{ $relatedPost->title }}
                                </h3>
                                <p class="text-gray-600 mb-4 text-sm line-clamp-2">
                                    {{ $relatedPost->excerpt }}
                                </p>
                                <a href="{{ route('blog.show', $relatedPost->slug) }}" 
                                    class="text-orange-600 font-semibold hover:text-orange-700 transition text-sm">
                                    Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- CTA Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center bg-gradient-to-r from-orange-500 to-red-600 rounded-3xl p-12 text-white"
                data-aos="zoom-in">
                <i class="fas fa-shopping-bag text-6xl mb-6 opacity-90"></i>
                <h2 class="text-4xl font-bold mb-4">Tertarik dengan Produk Kami?</h2>
                <p class="text-xl mb-8 text-white/90">
                    Jelajahi koleksi lengkap produk berkualitas dan temukan yang sesuai dengan kebutuhan Anda
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('products') }}"
                        class="inline-flex items-center justify-center bg-white text-orange-600 px-8 py-4 rounded-full font-bold hover:bg-gray-100 transition shadow-xl">
                        <i class="fas fa-shopping-bag mr-2"></i> Lihat Produk
                    </a>
                    <a href="https://wa.me/6282390017777" target="_blank"
                        class="inline-flex items-center justify-center bg-green-600 text-white px-8 py-4 rounded-full font-bold hover:bg-green-700 transition shadow-xl">
                        <i class="fab fa-whatsapp mr-2"></i> Chat WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <style>
        .prose {
            color: #374151;
        }

        .prose h2 {
            font-size: 2rem;
            font-weight: 800;
            color: #1F2937;
            margin-top: 2.5rem;
            margin-bottom: 1.25rem;
        }

        .prose h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1F2937;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .prose h4 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1F2937;
            margin-bottom: 0.75rem;
        }

        .prose p {
            margin-bottom: 1.5rem;
            line-height: 1.8;
            text-align: justify;
        }

        .prose ul,
        .prose ol {
            margin-bottom: 1.5rem;
            padding-left: 1.75rem;
        }

        .prose li {
            margin-bottom: 0.75rem;
            line-height: 1.6;
        }

        .prose strong {
            font-weight: 700;
            color: #1F2937;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function copyLink() {
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(() => {
                alert('Link berhasil disalin!');
            }).catch(err => {
                console.error('Error copying link:', err);
            });
        }
    </script>
@endpush