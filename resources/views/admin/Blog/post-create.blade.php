@extends('admin.layout')

@section('title', 'Tambah Artikel Blog')
@section('page-title', 'Tambah Artikel Blog')
@section('page-subtitle', 'Buat artikel blog baru')

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
        <form action="{{ route('admin.blog.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="p-8">
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
                                    <option value="{{ $category->id }}" {{ old('blog_category_id') == $category->id ? 'selected' : '' }}>
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
                            <input type="text" name="title" value="{{ old('title') }}" required
                                placeholder="Masukkan judul artikel yang menarik..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition @error('title') border-red-500 @enderror">
                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Excerpt -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                Ringkasan <span class="text-red-500">*</span>
                            </label>
                            <textarea name="excerpt" rows="3" required
                                placeholder="Tulis ringkasan singkat artikel (max 500 karakter)..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition @error('excerpt') border-red-500 @enderror">{{ old('excerpt') }}</textarea>
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
                            <input type="text" name="reading_time" value="{{ old('reading_time') }}"
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
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition font-mono text-sm @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
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
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">
                            Upload Gambar
                        </label>
                        <input type="file" name="featured_image" accept="image/*" 
                            onchange="previewImage(event)"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition @error('featured_image') border-red-500 @enderror">
                        @error('featured_image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-gray-500 text-sm mt-1">Format: JPG, PNG, GIF (Max: 2MB)</p>
                        
                        <!-- Image Preview -->
                        <div id="imagePreview" class="mt-4 hidden">
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
                            <input type="text" name="tags" value="{{ old('tags') }}"
                                placeholder="Laravel, PHP, Web Development"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition @error('tags') border-red-500 @enderror">
                            @error('tags')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-gray-500 text-sm mt-1">Pisahkan dengan koma (,)</p>
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
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
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
                            <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}
                                class="w-5 h-5 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                            <div>
                                <span class="text-gray-700 font-semibold group-hover:text-orange-600 transition">
                                    <i class="fas fa-globe text-green-500"></i> Publikasikan Sekarang
                                </span>
                                <p class="text-gray-500 text-sm">Artikel akan langsung terbit dan bisa dilihat publik</p>
                            </div>
                        </label>

                        <!-- Published Date (optional) -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                Tanggal Publikasi (Opsional)
                            </label>
                            <input type="datetime-local" name="published_at" value="{{ old('published_at') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition">
                            <p class="text-gray-500 text-sm mt-1">Kosongkan untuk menggunakan waktu sekarang</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="bg-gray-50 px-8 py-6 flex flex-col sm:flex-row gap-4 justify-end">
                <a href="{{ route('admin.blog.posts') }}"
                    class="px-6 py-3 border border-gray-300 rounded-lg hover:bg-gray-100 transition text-center font-semibold text-gray-700">
                    <i class="fas fa-times mr-2"></i>
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg hover:from-orange-600 hover:to-orange-700 transition shadow-lg font-semibold">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Artikel
                </button>
            </div>
        </form>
    </div>

    <!-- Preview Image Script -->
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
    </script>
@endsection 