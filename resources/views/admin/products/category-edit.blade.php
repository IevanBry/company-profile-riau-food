@extends('admin.layout')

@section('title', 'Edit Kategori')
@section('page-title', 'Edit Kategori Produk')
@section('page-subtitle', 'Perbarui informasi kategori')

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

    <form action="{{ route('admin.products.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-xl shadow-lg" data-aos="fade-up">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white p-6 rounded-t-xl">
                <h3 class="text-xl font-bold flex items-center">
                    <i class="fas fa-tags mr-3"></i> Informasi Kategori
                </h3>
                <p class="text-sm text-orange-100 mt-1">Perbarui detail kategori produk</p>
            </div>

            <div class="p-6 space-y-5">
                <!-- Name -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-tag text-orange-500 mr-1"></i> Nama Kategori *
                    </label>
                    <input type="text" name="name" value="{{ old('name', $category->name) }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition"
                        placeholder="Contoh: Kusuka Body Shampoo">
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-align-left text-orange-500 mr-1"></i> Deskripsi
                    </label>
                    <textarea name="description" rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition"
                        placeholder="Body shampoo premium dari Malaysia">{{ old('description', $category->description) }}</textarea>
                </div>

                <!-- Image Upload -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-image text-orange-500 mr-1"></i> Gambar Kategori
                    </label>
                    
                    <!-- Current Image Preview -->
                    @if($category->image)
                        <div class="mb-3">
                            <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" 
                                class="w-32 h-32 object-cover rounded-lg shadow-md">
                        </div>
                    @endif
                    
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-orange-500 transition">
                        <input type="file" name="image" id="imageInput" accept="image/*" class="hidden" onchange="previewImage(event)">
                        <label for="imageInput" class="cursor-pointer">
                            <div id="imagePreview">
                                <i class="fas fa-cloud-upload-alt text-5xl text-gray-400"></i>
                                <p class="mt-2 text-sm text-gray-600">Klik untuk upload gambar baru</p>
                                <p class="text-xs text-gray-500 mt-1">PNG, JPG, atau JPEG (Maks. 2MB)</p>
                            </div>
                        </label>
                    </div>
                    <p class="text-xs text-gray-500 mt-2">
                        <i class="fas fa-info-circle"></i> Kosongkan jika tidak ingin mengubah gambar
                    </p>
                </div>

                <!-- Order & Featured -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-sort text-orange-500 mr-1"></i> Urutan
                        </label>
                        <input type="number" name="order" value="{{ old('order', $category->order) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition"
                            placeholder="0">
                        <p class="text-xs text-gray-500 mt-1">Urutan tampilan (semakin kecil semakin di atas)</p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-star text-orange-500 mr-1"></i> Status
                        </label>
                        <div class="space-y-2">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="featured" value="1" {{ old('featured', $category->featured) ? 'checked' : '' }}
                                    class="w-5 h-5 text-orange-600 rounded focus:ring-orange-500">
                                <span class="ml-2 text-gray-700">Featured (Ditampilkan di halaman utama)</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $category->is_active) ? 'checked' : '' }}
                                    class="w-5 h-5 text-orange-600 rounded focus:ring-orange-500">
                                <span class="ml-2 text-gray-700">Aktif</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="mt-6 flex flex-col sm:flex-row gap-4 justify-between items-center bg-white p-6 rounded-xl shadow-lg"
            data-aos="fade-up" data-aos-delay="100">
            <a href="{{ route('admin.products.categories') }}"
                class="w-full sm:w-auto px-6 py-3 border-2 border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition flex items-center justify-center font-medium">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
            <button type="submit"
                class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg hover:from-orange-600 hover:to-orange-700 transition shadow-lg flex items-center justify-center font-semibold">
                <i class="fas fa-save mr-2"></i> Update Kategori
            </button>
        </div>
    </form>
@endsection

@push('scripts')
<script>
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
    
    // Image Preview Function
    function previewImage(event) {
        const file = event.target.files[0];
        const previewDiv = document.getElementById('imagePreview');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewDiv.innerHTML = `
                    <img src="${e.target.result}" class="mx-auto max-h-48 rounded-lg shadow-md mb-2">
                    <p class="text-sm text-gray-600">${file.name}</p>
                    <p class="text-xs text-gray-500">${(file.size / 1024).toFixed(2)} KB</p>
                `;
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush