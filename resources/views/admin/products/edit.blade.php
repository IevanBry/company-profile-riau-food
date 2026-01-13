@extends('admin.layout')

@section('title', 'Edit Produk')
@section('page-title', 'Edit Produk')
@section('page-subtitle', 'Perbarui informasi produk')

@section('content')
<!-- Error Alert -->
@if($errors->any())
    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg" data-aos="fade-down">
        <div class="flex items-start">
            <i class="fas fa-exclamation-circle mr-3 text-xl mt-0.5"></i>
            <div>
                <p class="font-semibold mb-2">Terdapat kesalahan:</p>
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Basic Information -->
    <div class="bg-white rounded-xl shadow-lg mb-6" data-aos="fade-up">
        <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white p-6 rounded-t-xl">
            <h3 class="text-xl font-bold flex items-center">
                <i class="fas fa-info-circle mr-3"></i> Informasi Produk
            </h3>
            <p class="text-sm text-orange-100 mt-1">Detail lengkap produk</p>
        </div>

        <div class="p-6 space-y-5">
            <!-- Category -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-folder text-orange-500 mr-1"></i> Kategori Produk *
                </label>
                <select name="product_category_id" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition">
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('product_category_id', $product->product_category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Name -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-box text-orange-500 mr-1"></i> Nama Produk *
                </label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition"
                    placeholder="Contoh: Kusuka Rose">
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-align-left text-orange-500 mr-1"></i> Deskripsi *
                </label>
                <textarea name="description" rows="4" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition"
                    placeholder="Body shampoo dengan ekstrak mawar yang memberikan aroma elegan dan menyegarkan untuk kulit Anda.">{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- Sizes -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-ruler text-orange-500 mr-1"></i> Ukuran Tersedia
                </label>
                <input type="text" name="sizes" value="{{ old('sizes', $product->sizes_string) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition"
                    placeholder="1000ML, 2000ML, 500ML">
                <p class="text-xs text-gray-500 mt-1">Pisahkan dengan koma. Contoh: 1000ML, 2000ML, 500ML</p>
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-image text-orange-500 mr-1"></i> Gambar Produk
                </label>
                
                @if($product->image)
                    <div class="mb-4">
                        <p class="text-xs text-gray-600 mb-2">Gambar Saat Ini:</p>
                        <div class="relative inline-block">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                                class="max-w-md w-full rounded-lg shadow-md border-2 border-gray-200">
                            <div class="mt-2">
                                <label class="flex items-center cursor-pointer text-sm text-red-600 hover:text-red-700">
                                    <input type="checkbox" name="remove_image" value="1" class="mr-2">
                                    Hapus gambar ini
                                </label>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="mb-4 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                        <p class="text-sm text-yellow-800">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            Produk ini belum memiliki gambar. Sebaiknya upload gambar untuk tampilan yang lebih baik.
                        </p>
                    </div>
                @endif

                <div class="mt-2">
                    <input type="file" name="image" id="imageInput" accept="image/*"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
                    <p class="text-xs text-gray-500 mt-1">
                        Format: JPG, PNG, atau GIF. Maksimal 2MB. 
                        @if($product->image)
                            Upload gambar baru untuk mengganti gambar yang ada
                        @else
                            Upload gambar produk
                        @endif
                    </p>
                </div>

                <!-- Preview New Image -->
                <div id="imagePreview" class="mt-4 hidden">
                    <p class="text-xs text-gray-600 mb-2">Preview Gambar Baru:</p>
                    <div class="relative inline-block">
                        <img id="previewImg" src="" alt="Preview" class="max-w-md w-full rounded-lg shadow-md border-2 border-orange-200">
                        <button type="button" onclick="removeNewImage()" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-2 hover:bg-red-600 transition shadow-lg">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Settings -->
    <div class="bg-white rounded-xl shadow-lg mb-6" data-aos="fade-up" data-aos-delay="100">
        <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-t-xl">
            <h3 class="text-xl font-bold flex items-center">
                <i class="fas fa-cog mr-3"></i> Pengaturan
            </h3>
            <p class="text-sm text-green-100 mt-1">Status dan urutan produk</p>
        </div>

        <div class="p-6 space-y-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Order -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-sort text-green-500 mr-1"></i> Urutan Tampilan
                    </label>
                    <input type="number" name="order" value="{{ old('order', $product->order) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                        placeholder="0">
                    <p class="text-xs text-gray-500 mt-1">Urutan tampilan (semakin kecil semakin di atas)</p>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-toggle-on text-green-500 mr-1"></i> Status Produk
                    </label>
                    <label class="flex items-center cursor-pointer mt-3">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                            class="w-5 h-5 text-green-600 rounded focus:ring-green-500">
                        <span class="ml-2 text-gray-700">Aktif (Tampilkan di website)</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Submit Buttons -->
    <div class="flex flex-col sm:flex-row gap-4 justify-between items-center bg-white p-6 rounded-xl shadow-lg"
        data-aos="fade-up" data-aos-delay="200">
        <a href="{{ route('admin.products.index') }}"
            class="w-full sm:w-auto px-6 py-3 border-2 border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition flex items-center justify-center font-medium">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
        <button type="submit"
            class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg hover:from-orange-600 hover:to-orange-700 transition shadow-lg flex items-center justify-center font-semibold">
            <i class="fas fa-save mr-2"></i> Update Produk
        </button>
    </div>
</form>
@endsection

@push('scripts')
<script>
    // Preview new image before upload
    document.getElementById('imageInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImg').src = e.target.result;
                document.getElementById('imagePreview').classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });

    // Remove new image preview
    function removeNewImage() {
        document.getElementById('imageInput').value = '';
        document.getElementById('imagePreview').classList.add('hidden');
        document.getElementById('previewImg').src = '';
    }

    // Product menu toggle
    function toggleProductMenu() {
        const menu = document.getElementById('productMenu');
        const icon = document.getElementById('productMenuIcon');
        menu.classList.toggle('hidden');
        icon.classList.toggle('fa-chevron-down');
        icon.classList.toggle('fa-chevron-up');
    }

    if (window.location.pathname.includes('/admin/products')) {
        document.getElementById('productMenu').classList.remove('hidden');
        document.getElementById('productMenuIcon').classList.remove('fa-chevron-down');
        document.getElementById('productMenuIcon').classList.add('fa-chevron-up');
    }
</script>
@endpush