@extends('layouts.app')

@section('title', $article['title'] . ' - PT. Riau Food Lestari')

@section('content')

    <!-- Article Hero -->
    <section class="relative h-[600px] overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
        </div>

        <div class="container mx-auto px-4 h-full flex items-end relative z-10 pb-12">
            <div class="max-w-4xl" data-aos="fade-up">
                <div class="inline-block bg-orange-500 text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    {{ $article['category'] }}
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
                    {{ $article['title'] }}
                </h1>
                <div class="flex flex-wrap items-center gap-6 text-white/90">
                    <div class="flex items-center">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <div class="font-semibold">{{ $article['author'] }}</div>
                            <div class="text-sm text-white/70">Author</div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-calendar mr-2 text-orange-400"></i>
                        {{ date('d F Y', strtotime($article['date'])) }}
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-clock mr-2 text-orange-400"></i>
                        {{ $article['reading_time'] }}
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-eye mr-2 text-orange-400"></i>
                        1,234 views
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
                            <a href="#"
                                class="w-10 h-10 bg-blue-600 text-white rounded-lg flex items-center justify-center hover:bg-blue-700 transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-sky-500 text-white rounded-lg flex items-center justify-center hover:bg-sky-600 transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-green-600 text-white rounded-lg flex items-center justify-center hover:bg-green-700 transition">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-blue-700 text-white rounded-lg flex items-center justify-center hover:bg-blue-800 transition">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-gray-600 text-white rounded-lg flex items-center justify-center hover:bg-gray-700 transition">
                                <i class="fas fa-link"></i>
                            </a>
                        </div>
                    </div>
                    <button class="flex items-center space-x-2 text-gray-600 hover:text-orange-600 transition">
                        <i class="far fa-bookmark text-xl"></i>
                        <span class="font-semibold">Simpan</span>
                    </button>
                </div>

                <!-- Article Body -->
                <article class="prose prose-lg max-w-none" data-aos="fade-up">

                    <h2>Pentingnya Memilih Body Shampoo yang Tepat</h2>

                    <p class="lead">
                        Memilih body shampoo yang tepat adalah langkah penting dalam rutinitas perawatan kulit Anda. Produk
                        yang tidak sesuai dengan jenis kulit dapat menyebabkan berbagai masalah seperti kulit kering,
                        iritasi, atau bahkan alergi.
                    </p>

                    <p>
                        Dalam artikel ini, kami akan membahas secara detail bagaimana memilih body shampoo yang sesuai
                        dengan kebutuhan kulit Anda, serta tips-tips penting yang perlu diperhatikan saat berbelanja produk
                        perawatan tubuh.
                    </p>

                    <h3>1. Kenali Jenis Kulit Anda</h3>

                    <p>
                        Langkah pertama dalam memilih body shampoo adalah mengenali jenis kulit Anda. Setiap jenis kulit
                        memiliki kebutuhan yang berbeda:
                    </p>

                    <ul>
                        <li><strong>Kulit Normal:</strong> Membutuhkan produk yang menjaga keseimbangan alami kulit</li>
                        <li><strong>Kulit Kering:</strong> Memerlukan formula yang lebih melembabkan dan kaya nutrisi</li>
                        <li><strong>Kulit Berminyak:</strong> Cocok dengan produk yang dapat mengontrol minyak berlebih</li>
                        <li><strong>Kulit Sensitif:</strong> Membutuhkan produk hypoallergenic dan bebas pewangi keras</li>
                    </ul>

                    <div class="bg-orange-50 border-l-4 border-orange-500 p-6 my-8">
                        <div class="flex items-start">
                            <i class="fas fa-lightbulb text-orange-500 text-2xl mr-4 mt-1"></i>
                            <div>
                                <h4 class="text-lg font-bold text-gray-800 mb-2">Tips Pro</h4>
                                <p class="text-gray-700 mb-0">
                                    Jika Anda tidak yakin dengan jenis kulit Anda, konsultasikan dengan dermatolog atau
                                    lakukan tes sederhana di rumah dengan mengamati kondisi kulit Anda setelah mandi.
                                </p>
                            </div>
                        </div>
                    </div>

                    <h3>2. Perhatikan Kandungan Bahan</h3>

                    <p>
                        Bahan-bahan dalam body shampoo sangat menentukan kualitas dan efektivitas produk. Beberapa bahan
                        yang perlu Anda perhatikan:
                    </p>

                    <div class="grid md:grid-cols-2 gap-6 my-8">
                        <div class="bg-green-50 p-6 rounded-xl">
                            <h4 class="font-bold text-green-800 mb-3 flex items-center">
                                <i class="fas fa-check-circle mr-2"></i> Bahan yang Baik
                            </h4>
                            <ul class="text-gray-700 space-y-2">
                                <li>✓ Natural oils (coconut, argan, jojoba)</li>
                                <li>✓ Vitamin E dan C</li>
                                <li>✓ Aloe vera</li>
                                <li>✓ Shea butter</li>
                                <li>✓ Glycerin</li>
                            </ul>
                        </div>
                        <div class="bg-red-50 p-6 rounded-xl">
                            <h4 class="font-bold text-red-800 mb-3 flex items-center">
                                <i class="fas fa-times-circle mr-2"></i> Bahan yang Harus Dihindari
                            </h4>
                            <ul class="text-gray-700 space-y-2">
                                <li>✗ Sulfat keras (SLS/SLES)</li>
                                <li>✗ Paraben</li>
                                <li>✗ Pewarna sintetis</li>
                                <li>✗ Alkohol denaturing</li>
                                <li>✗ Parfum sintetis berlebihan</li>
                            </ul>
                        </div>
                    </div>

                    <h3>3. Sesuaikan dengan Kebutuhan Spesifik</h3>

                    <p>
                        Selain jenis kulit, pertimbangkan juga kebutuhan spesifik Anda:
                    </p>

                    <blockquote class="border-l-4 border-orange-500 pl-6 italic text-gray-700 my-8">
                        "Produk perawatan kulit yang tepat bukan hanya soal membersihkan, tetapi juga menutrisi dan
                        melindungi kulit Anda dari faktor lingkungan yang merusak."
                        <footer class="text-sm text-gray-600 mt-2">— Dr. Skin Care Specialist</footer>
                    </blockquote>

                    <h3>4. Rekomendasi Produk</h3>

                    <p>
                        Berikut beberapa rekomendasi body shampoo yang bisa Anda coba dari koleksi Kusuka:
                    </p>

                    <div class="grid md:grid-cols-2 gap-6 my-8">
                        <div class="border border-gray-200 rounded-xl p-6 hover:shadow-lg transition">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-pink-400 to-pink-600 rounded-lg flex items-center justify-center mb-4">
                                <i class="fas fa-spa text-white text-xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-800 mb-2">Kusuka Rose</h4>
                            <p class="text-gray-600 text-sm mb-3">Cocok untuk kulit normal hingga kering dengan aroma mawar
                                yang elegan</p>
                            <a href="/products" class="text-orange-600 font-semibold text-sm hover:text-orange-700">
                                Lihat Produk <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="border border-gray-200 rounded-xl p-6 hover:shadow-lg transition">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-green-400 to-teal-600 rounded-lg flex items-center justify-center mb-4">
                                <i class="fas fa-lemon text-white text-xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-800 mb-2">Kusuka Pomelo</h4>
                            <p class="text-gray-600 text-sm mb-3">Ideal untuk kulit berminyak dengan kesegaran citrus yang
                                menyegarkan</p>
                            <a href="/products" class="text-orange-600 font-semibold text-sm hover:text-orange-700">
                                Lihat Produk <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>

                    <h3>Kesimpulan</h3>

                    <p>
                        Memilih body shampoo yang tepat memerlukan pemahaman tentang jenis kulit dan kebutuhan spesifik
                        Anda. Jangan ragu untuk mencoba beberapa produk hingga menemukan yang paling cocok. Ingat, kulit
                        setiap orang berbeda, jadi apa yang cocok untuk orang lain belum tentu cocok untuk Anda.
                    </p>

                    <p>
                        Untuk mendapatkan hasil maksimal, gunakan produk secara konsisten dan perhatikan reaksi kulit Anda.
                        Jika terjadi iritasi atau reaksi alergi, hentikan penggunaan dan konsultasikan dengan dokter kulit.
                    </p>

                </article>

                <!-- Tags -->
                <div class="flex flex-wrap gap-3 mt-12 pt-8 border-t border-gray-200" data-aos="fade-up">
                    <span class="text-gray-600 font-semibold">Tags:</span>
                    <a href="#"
                        class="bg-gray-100 hover:bg-orange-100 text-gray-700 hover:text-orange-700 px-4 py-2 rounded-full text-sm transition">
                        Body Shampoo
                    </a>
                    <a href="#"
                        class="bg-gray-100 hover:bg-orange-100 text-gray-700 hover:text-orange-700 px-4 py-2 rounded-full text-sm transition">
                        Perawatan Kulit
                    </a>
                    <a href="#"
                        class="bg-gray-100 hover:bg-orange-100 text-gray-700 hover:text-orange-700 px-4 py-2 rounded-full text-sm transition">
                        Tips Kecantikan
                    </a>
                    <a href="#"
                        class="bg-gray-100 hover:bg-orange-100 text-gray-700 hover:text-orange-700 px-4 py-2 rounded-full text-sm transition">
                        Kusuka
                    </a>
                </div>

                <!-- Author Box -->
                <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-2xl p-8 mt-12" data-aos="fade-up">
                    <div class="flex items-start space-x-6">
                        <div
                            class="w-24 h-24 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-white text-3xl"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-2xl font-bold text-gray-800 mb-2">{{ $article['author'] }}</h4>
                            <p class="text-gray-600 mb-4">
                                Expert dalam industri distribusi dan produk personal care dengan pengalaman lebih dari 10
                                tahun.
                                Berkomitmen untuk memberikan informasi terpercaya dan bermanfaat bagi konsumen.
                            </p>
                            <div class="flex gap-3">
                                <a href="#" class="text-gray-600 hover:text-orange-600 transition">
                                    <i class="fab fa-facebook text-xl"></i>
                                </a>
                                <a href="#" class="text-gray-600 hover:text-orange-600 transition">
                                    <i class="fab fa-twitter text-xl"></i>
                                </a>
                                <a href="#" class="text-gray-600 hover:text-orange-600 transition">
                                    <i class="fab fa-linkedin text-xl"></i>
                                </a>
                                <a href="#" class="text-gray-600 hover:text-orange-600 transition">
                                    <i class="fab fa-instagram text-xl"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Related Articles -->
    <section class="py-20 bg-gradient-to-br from-orange-50 to-red-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-4xl font-bold mb-4 text-gray-800">
                    Artikel <span class="text-gradient">Terkait</span>
                </h2>
                <p class="text-gray-600 text-lg">Baca juga artikel menarik lainnya</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @for($i = 1; $i <= 3; $i++)
                    <article
                        class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2"
                        data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1556228578-{{ 0 + $i }}d85b1a4d571?w=800" alt="Article"
                                class="w-full h-full object-cover">
                            <div
                                class="absolute top-4 left-4 bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                Tips & Tricks
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2 hover:text-orange-600 transition">
                                Artikel Terkait {{ $i }}
                            </h3>
                            <p class="text-gray-600 mb-4 text-sm">Excerpt singkat tentang artikel ini yang memberikan gambaran
                                kepada pembaca...</p>
                            <a href="#" class="text-orange-600 font-semibold hover:text-orange-700 transition">
                                Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </article>
                @endfor
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center bg-gradient-to-r from-orange-500 to-red-600 rounded-3xl p-12 text-white"
                data-aos="zoom-in">
                <h2 class="text-4xl font-bold mb-4">Tertarik dengan Produk Kami?</h2>
                <p class="text-xl mb-8 text-gray-100">Jelajahi koleksi lengkap produk Kusuka dan temukan yang sesuai dengan
                    kebutuhan Anda</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/products"
                        class="inline-flex items-center justify-center bg-white text-orange-600 px-8 py-4 rounded-full font-bold hover:bg-gray-100 transition shadow-xl">
                        <i class="fas fa-shopping-bag mr-2"></i>Lihat Produk
                    </a>
                    <a href="https://wa.me/6282390017777" target="_blank"
                        class="inline-flex items-center justify-center bg-orange-800 text-white px-8 py-4 rounded-full font-bold hover:bg-orange-900 transition shadow-xl border-2 border-white/30">
                        <i class="fab fa-whatsapp mr-2"></i>Chat WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <style>
        .text-gradient {
            background: linear-gradient(135deg, #F97316 0%, #DC2626 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .prose {
            color: #374151;
        }

        .prose h2 {
            font-size: 2rem;
            font-weight: 800;
            color: #1F2937;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .prose h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1F2937;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
        }

        .prose h4 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1F2937;
            margin-bottom: 0.5rem;
        }

        .prose p {
            margin-bottom: 1.25rem;
            line-height: 1.75;
        }

        .prose ul,
        .prose ol {
            margin-bottom: 1.25rem;
            padding-left: 1.5rem;
        }

        .prose li {
            margin-bottom: 0.5rem;
        }

        .prose strong {
            font-weight: 600;
            color: #1F2937;
        }

        .prose .lead {
            font-size: 1.25rem;
            line-height: 1.75;
            color: #4B5563;
            margin-bottom: 1.5rem;
        }

        .prose blockquote {
            font-size: 1.125rem;
            line-height: 1.75;
            padding: 1.5rem;
            background: #F9FAFB;
            border-radius: 0.5rem;
        }
    </style>
@endpush