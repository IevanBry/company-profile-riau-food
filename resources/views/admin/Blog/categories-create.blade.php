{{-- resources/views/admin/blog/categories-create.blade.php --}}
@extends('admin.layout')

@section('title', 'Tambah Kategori Blog')
@section('page-title', 'Tambah Kategori Blog')
@section('page-subtitle', 'Buat kategori blog baru')

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('admin.blog.categories') }}"
                class="inline-flex items-center text-gray-600 hover:text-blue-600 transition">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Kategori
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-lg p-8" data-aos="fade-up">
            <form action="{{ route('admin.blog.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Nama Kategori -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-tag text-blue-500 mr-2"></i> Nama Kategori *
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error('name') border-red-500 @enderror"
                        placeholder="Contoh: Tips & Trik, Berita Industri">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-link text-blue-500 mr-2"></i> Slug *
                    </label>
                    <input type="text" name="slug" value="{{ old('slug') }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error('slug') border-red-500 @enderror"
                        placeholder="tips-dan-trik">
                    <p class="text-gray-500 text-sm mt-1">URL-friendly. Otomatis dibuat dari nama jika dikosongkan.</p>
                    @error('slug')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Icon (Emoji) -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-icons text-blue-500 mr-2"></i> Icon (Emoji)
                    </label>
                    <div class="flex items-center space-x-4">
                        <input type="text" name="icon" value="{{ old('icon') }}"
                            class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error('icon') border-red-500 @enderror"
                            placeholder="📝">
                        <div class="flex space-x-2">
                            <button type="button" onclick="setIcon('📝')" class="px-3 py-2 bg-gray-100 hover:bg-gray-200 rounded text-2xl">📝</button>
                            <button type="button" onclick="setIcon('💡')" class="px-3 py-2 bg-gray-100 hover:bg-gray-200 rounded text-2xl">💡</button>
                            <button type="button" onclick="setIcon('📰')" class="px-3 py-2 bg-gray-100 hover:bg-gray-200 rounded text-2xl">📰</button>
                            <button type="button" onclick="setIcon('🎯')" class="px-3 py-2 bg-gray-100 hover:bg-gray-200 rounded text-2xl">🎯</button>
                            <button type="button" onclick="setIcon('🚀')" class="px-3 py-2 bg-gray-100 hover:bg-gray-200 rounded text-2xl">🚀</button>
                        </div>
                    </div>
                    <p class="text-gray-500 text-sm mt-1">Pilih emoji atau ketik sendiri</p>
                    @error('icon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Color -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-palette text-blue-500 mr-2"></i> Warna Kategori
                    </label>
                    <div class="grid grid-cols-4 gap-3">
                        <label class="cursor-pointer">
                            <input type="radio" name="color" value="bg-gradient-to-r from-blue-500 to-blue-600" class="hidden peer" {{ old('color') == 'bg-gradient-to-r from-blue-500 to-blue-600' ? 'checked' : '' }}>
                            <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-12 rounded-lg peer-checked:ring-4 peer-checked:ring-blue-300"></div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="color" value="bg-gradient-to-r from-purple-500 to-purple-600" class="hidden peer" {{ old('color') == 'bg-gradient-to-r from-purple-500 to-purple-600' ? 'checked' : '' }}>
                            <div class="bg-gradient-to-r from-purple-500 to-purple-600 h-12 rounded-lg peer-checked:ring-4 peer-checked:ring-purple-300"></div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="color" value="bg-gradient-to-r from-green-500 to-green-600" class="hidden peer" {{ old('color') == 'bg-gradient-to-r from-green-500 to-green-600' ? 'checked' : '' }}>
                            <div class="bg-gradient-to-r from-green-500 to-green-600 h-12 rounded-lg peer-checked:ring-4 peer-checked:ring-green-300"></div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="color" value="bg-gradient-to-r from-orange-500 to-orange-600" class="hidden peer" {{ old('color') == 'bg-gradient-to-r from-orange-500 to-orange-600' ? 'checked' : '' }}>
                            <div class="bg-gradient-to-r from-orange-500 to-orange-600 h-12 rounded-lg peer-checked:ring-4 peer-checked:ring-orange-300"></div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="color" value="bg-gradient-to-r from-red-500 to-red-600" class="hidden peer" {{ old('color') == 'bg-gradient-to-r from-red-500 to-red-600' ? 'checked' : '' }}>
                            <div class="bg-gradient-to-r from-red-500 to-red-600 h-12 rounded-lg peer-checked:ring-4 peer-checked:ring-red-300"></div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="color" value="bg-gradient-to-r from-pink-500 to-pink-600" class="hidden peer" {{ old('color') == 'bg-gradient-to-r from-pink-500 to-pink-600' ? 'checked' : '' }}>
                            <div class="bg-gradient-to-r from-pink-500 to-pink-600 h-12 rounded-lg peer-checked:ring-4 peer-checked:ring-pink-300"></div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="color" value="bg-gradient-to-r from-indigo-500 to-indigo-600" class="hidden peer" {{ old('color') == 'bg-gradient-to-r from-indigo-500 to-indigo-600' ? 'checked' : '' }}>
                            <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 h-12 rounded-lg peer-checked:ring-4 peer-checked:ring-indigo-300"></div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="color" value="bg-gradient-to-r from-teal-500 to-teal-600" class="hidden peer" {{ old('color') == 'bg-gradient-to-r from-teal-500 to-teal-600' ? 'checked' : '' }}>
                            <div class="bg-gradient-to-r from-teal-500 to-teal-600 h-12 rounded-lg peer-checked:ring-4 peer-checked:ring-teal-300"></div>
                        </label>
                    </div>
                    @error('color')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-align-left text-blue-500 mr-2"></i> Deskripsi
                    </label>
                    <textarea name="description" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error('description') border-red-500 @enderror"
                        placeholder="Deskripsi singkat tentang kategori ini">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-sort text-blue-500 mr-2"></i> Urutan Tampilan
                    </label>
                    <input type="number" name="order" value="{{ old('order', 0) }}" min="0"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error('order') border-red-500 @enderror">
                    <p class="text-gray-500 text-sm mt-1">Semakin kecil angka, semakin awal ditampilkan</p>
                    @error('order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div class="mb-6">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                            class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <span class="ml-3 text-gray-700 font-semibold">
                            <i class="fas fa-toggle-on text-green-500 mr-2"></i> Kategori Aktif
                        </span>
                    </label>
                    <p class="text-gray-500 text-sm mt-1 ml-8">Kategori aktif akan ditampilkan di website</p>
                </div>

                <!-- Submit Buttons -->
                <div class="flex gap-3 pt-6 border-t">
                    <button type="submit"
                        class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-lg hover:from-blue-600 hover:to-blue-700 transition shadow-lg font-semibold">
                        <i class="fas fa-save mr-2"></i> Simpan Kategori
                    </button>
                    <a href="{{ route('admin.blog.categories') }}"
                        class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition font-semibold">
                        <i class="fas fa-times mr-2"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function setIcon(emoji) {
            document.querySelector('input[name="icon"]').value = emoji;
        }

        // Auto generate slug from name
        document.querySelector('input[name="name"]').addEventListener('input', function(e) {
            const slug = e.target.value
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim();
            document.querySelector('input[name="slug"]').value = slug;
        });
    </script>
@endpush