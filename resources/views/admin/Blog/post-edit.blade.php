@extends('admin.layout')

@section('title', 'Edit Artikel Blog')
@section('page-title', 'Edit Artikel Blog')
@section('page-subtitle', 'Perbarui artikel blog')

@section('content')
    <!-- Back Button -->
    <div class="mb-6" data-aos="fade-right">
        <a href="{{ route('admin.blog.posts') }}"
            class="inline-flex items-center text-gray-600 hover:text-orange-600 transition">
            <i class="fas fa-arrow-left mr-2"></i>
            <span class="font-medium">Kembali ke Daftar Artikel</span>
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up">
        <form action="{{ route('admin.blog.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="p-8">
                <!-- Article Info Badge -->
                <div class="mb-6 p-4 bg-blue-50 border-l-4 border-blue-500 rounded-lg">
                    <div class="flex items-center justify-between flex-wrap gap-3">
                        <div class="flex items-center gap-4">
                            <i class="fas fa-info-circle text-blue-500 text-xl"></i>
                            <div>
                                <p class="text-sm text-gray-600">
                                    <span class="font-semibold">Dibuat:</span> {{ $post->created_at->format('d M Y, H:i') }}
                                </p>
                                <p class="text-sm text-gray-600">
                                    <span class="font-semibold">Terakhir diubah:</span> {{ $post->updated_at->format('d M Y, H:i') }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            @if($post->is_published)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">
                                    <i class="fas fa-check-circle"></i> Published
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-bold">
                                    <i class="fas fa-clock"></i> Draft
                                </span>
                            @endif
                            @if($post->is_featured)
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold">
                                    <i class="fas fa-star"></i> Featured
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Basic Information Section -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-info-circle text-orange-500 mr-3"></i>
                        Informasi Dasar
                    </h3>
                    <div class="grid gap-6">
                        <!-- Category -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                Kategori <span class="text-red-500">*</span>
                            </label>
                            <select name="blog_category_id" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition @error('blog_category_id') border-red-500 @enderror">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        {{ (old('blog_category_id', $post->blog_category_id) == $category->id) ? 'selected' : '' }}>
                                        {{ $category->icon }} {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('blog_category_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Title -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                Judul Artikel <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="title" value="{{ old('title', $post->title) }}" required
                                placeholder="Masukkan judul artikel yang menarik..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition @error('title') border-red-500 @enderror">
                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Slug Preview -->
                        <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                            <p class="text-xs text-gray-500 mb-1">URL Slug:</p>
                            <p class="text-sm text-gray-700 font-mono">{{ $post->slug }}</p>
                        </div>

                        <!-- Excerpt -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                Ringkasan <span class="text-red-500">*</span>
                            </label>
                            <textarea name="excerpt" rows="3" required
                                placeholder="Tulis ringkasan singkat artikel (max 500 karakter)..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition @error('excerpt') border-red-500 @enderror">{{ old('excerpt', $post->excerpt) }}</textarea>
                            @error('excerpt')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-gray-500 text-sm mt-1">Maksimal 500 karakter</p>
                        </div>

                        <!-- Reading Time -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                Waktu Baca
                            </label>
                            <input type="text" name="reading_time" value="{{ old('reading_time', $post->reading_time) }}"
                                placeholder="Contoh: 5 min read"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition @error('reading_time') border-red-500 @enderror">
                            @error('reading_time')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-gray-500 text-sm mt-1">Contoh: "5 min read" atau "10 menit"</p>
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-file-alt text-orange-500 mr-3"></i>
                        Konten Artikel
                    </h3>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">
                            Konten <span class="text-red-500">*</span>
                        </label>
                        <textarea name="content" rows="15" required
                            placeholder="Tulis konten artikel lengkap di sini..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition font-mono text-sm @error('content') border-red-500 @enderror">{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-gray-500 text-sm mt-1">
                            <i class="fas fa-info-circle"></i> 
                            Gunakan format Markdown untuk styling (bold, italic, heading, dll)
                        </p>
                    </div>
                </div>

                <!-- Featured Image Section -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-image text-orange-500 mr-3"></i>
                        Gambar Unggulan
                    </h3>

                    <!-- Current Image -->
                    @if($post->featured_image)
                        <div class="mb-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                            <p class="text-sm font-semibold text-gray-700 mb-3">Gambar Saat Ini:</p>
                            <div class="flex items-start gap-4">
                                <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                    alt="Current featured image"
                                    class="max-w-xs rounded-lg shadow-md"
                                    id="currentImage">
                                <div class="flex-1">
                                    <label class="flex items-center space-x-2 cursor-pointer text-red-600 hover:text-red-700 transition">
                                        <input type="checkbox" name="remove_image" value="1" 
                                            onchange="toggleImageRemoval(this)"
                                            class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                                        <span class="font-medium">
                                            <i class="fas fa-trash-alt"></i> Hapus gambar ini
                                        </span>
                                    </label>
                                    <p class="text-xs text-gray-500 mt-2">Centang untuk menghapus gambar saat menyimpan</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Upload New Image -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">
                            {{ $post->featured_image ? 'Ganti Gambar' : 'Upload Gambar' }}
                        </label>
                        <input type="file" name="featured_image" accept="image/*" 
                            onchange="previewImage(event)"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition @error('featured_image') border-red-500 @enderror">
                        @error('featured_image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-gray-500 text-sm mt-1">Format: JPG, PNG, GIF (Max: 2MB)</p>
                        
                        <!-- New Image Preview -->
                        <div id="imagePreview" class="mt-4 hidden">
                            <p class="text-sm font-semibold text-gray-700 mb-2">Preview Gambar Baru:</p>
                            <img id="preview" class="max-w-md rounded-lg shadow-md" alt="Preview">
                        </div>
                    </div>
                </div>

                <!-- Additional Info Section -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-tags text-orange-500 mr-3"></i>
                        Informasi Tambahan
                    </h3>
                    <div class="grid gap-6">
                        <!-- Tags -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                Tags
                            </label>
                            <input type="text" name="tags" value="{{ old('tags', $post->tags_string) }}"
                                placeholder="Laravel, PHP, Web Development"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition @error('tags') border-red-500 @enderror">
                            @error('tags')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-gray-500 text-sm mt-1">Pisahkan dengan koma (,)</p>
                        </div>

                        <!-- Views Count (Read Only) -->
                        <div class="p-4 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-eye text-blue-500 text-2xl"></i>
                                    <div>
                                        <p class="text-sm text-gray-600">Total Views</p>
                                        <p class="text-2xl font-bold text-gray-800">{{ number_format($post->views_count) }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs text-gray-500">Statistik</p>
                                    <p class="text-sm text-gray-600">Pembaca</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Publishing Options -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-cog text-orange-500 mr-3"></i>
                        Pengaturan Publikasi
                    </h3>
                    <div class="space-y-4">
                        <!-- Is Featured -->
                        <label class="flex items-center space-x-3 cursor-pointer group">
                            <input type="checkbox" name="is_featured" value="1" 
                                {{ old('is_featured', $post->is_featured) ? 'checked' : '' }}
                                class="w-5 h-5 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                            <div>
                                <span class="text-gray-700 font-semibold group-hover:text-orange-600 transition">
                                    <i class="fas fa-star text-yellow-500"></i> Tandai sebagai Unggulan
                                </span>
                                <p class="text-gray-500 text-sm">Artikel akan ditampilkan di bagian featured</p>
                            </div>
                        </label>

                        <!-- Is Published -->
                        <label class="flex items-center space-x-3 cursor-pointer group">
                            <input type="checkbox" name="is_published" value="1" 
                                {{ old('is_published', $post->is_published) ? 'checked' : '' }}
                                class="w-5 h-5 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                            <div>
                                <span class="text-gray-700 font-semibold group-hover:text-orange-600 transition">
                                    <i class="fas fa-globe text-green-500"></i> Publikasikan
                                </span>
                                <p class="text-gray-500 text-sm">Artikel akan terbit dan bisa dilihat publik</p>
                            </div>
                        </label>

                        <!-- Published Date -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                Tanggal Publikasi
                            </label>
                            <input type="datetime-local" name="published_at" 
                                value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition">
                            <p class="text-gray-500 text-sm mt-1">Kosongkan untuk menggunakan waktu sekarang</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="bg-gray-50 px-8 py-6 flex flex-col sm:flex-row gap-4 justify-between">
                <a href="{{ route('admin.blog.posts') }}"
                    class="px-6 py-3 border border-gray-300 rounded-lg hover:bg-gray-100 transition text-center font-semibold text-gray-700">
                    <i class="fas fa-times mr-2"></i>
                    Batal
                </a>
                <div class="flex flex-col sm:flex-row gap-4">
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg hover:from-orange-600 hover:to-orange-700 transition shadow-lg font-semibold">
                        <i class="fas fa-save mr-2"></i>
                        Perbarui Artikel
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Scripts -->
    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('imagePreview');
            const file = event.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                previewContainer.classList.add('hidden');
            }
        }

        function toggleImageRemoval(checkbox) {
            const currentImage = document.getElementById('currentImage');
            if (checkbox.checked) {
                currentImage.style.opacity = '0.3';
                currentImage.style.filter = 'grayscale(100%)';
            } else {
                currentImage.style.opacity = '1';
                currentImage.style.filter = 'none';
            }
        }
    </script>
@endsection