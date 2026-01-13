@extends('admin.layout')

@section('title', 'Kategori Produk')
@section('page-title', 'Kategori Produk')
@section('page-subtitle', 'Kelola kategori produk')

@section('content')
    <!-- Success Alert -->
    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center"
            data-aos="fade-down">
            <i class="fas fa-check-circle mr-3 text-xl"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- Header Actions -->
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4" data-aos="fade-up">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Daftar Kategori</h2>
            <p class="text-gray-600 text-sm mt-1">Total: {{ $categories->count() }} kategori</p>
        </div>
        <a href="{{ route('admin.products.categories.create') }}"
            class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-3 rounded-lg hover:from-orange-600 hover:to-orange-700 transition shadow-lg flex items-center font-semibold">
            <i class="fas fa-plus mr-2"></i> Tambah Kategori
        </a>
    </div>

    <!-- Categories Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($categories as $category)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition" data-aos="fade-up"
                data-aos-delay="{{ $loop->index * 100 }}">

                <!-- Category Image -->
                @if($category->image)
                    <div class="h-48 overflow-hidden bg-gradient-to-r from-orange-100 to-orange-200">
                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                            class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                    </div>
                @else
                    <div class="h-48 bg-gradient-to-r from-orange-400 to-orange-500 flex items-center justify-center">
                        <i class="fas fa-image text-white text-6xl opacity-50"></i>
                    </div>
                @endif

                <!-- Header -->
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-xl font-bold text-gray-800">{{ $category->name }}</h3>
                        @if($category->featured)
                            <span class="bg-yellow-400 text-yellow-900 px-2 py-1 rounded text-xs font-bold">
                                <i class="fas fa-star"></i> Featured
                            </span>
                        @endif
                    </div>

                    <p class="text-gray-600 text-sm mb-4">
                        {{ $category->description ?? 'Tidak ada deskripsi' }}
                    </p>

                    <!-- Stats -->
                    <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-200">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-orange-600">{{ $category->products_count }}</div>
                            <div class="text-xs text-gray-500">Produk</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">{{ $category->order }}</div>
                            <div class="text-xs text-gray-500">Urutan</div>
                        </div>
                        <div class="text-center">
                            @if($category->is_active)
                                <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    <i class="fas fa-check-circle"></i> Aktif
                                </span>
                            @else
                                <span class="inline-block bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    <i class="fas fa-times-circle"></i> Nonaktif
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-2">
                        <a href="{{ route('admin.products.categories.edit', $category->id) }}"
                            class="flex-1 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition text-center text-sm font-medium">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.products.categories.delete', $category->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus kategori ini? Semua produk dalam kategori ini juga akan terhapus!');"
                            class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition text-sm font-medium">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white rounded-xl shadow-lg p-12 text-center">
                <i class="fas fa-box-open text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-bold text-gray-700 mb-2">Belum Ada Kategori</h3>
                <p class="text-gray-500 mb-6">Mulai dengan menambahkan kategori produk pertama Anda</p>
                <a href="{{ route('admin.products.categories.create') }}"
                    class="inline-block bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-3 rounded-lg hover:from-orange-600 hover:to-orange-700 transition shadow-lg font-semibold">
                    <i class="fas fa-plus mr-2"></i> Tambah Kategori
                </a>
            </div>
        @endforelse
    </div>
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

        // Auto open if on product pages
        if (window.location.pathname.includes('/admin/products')) {
            document.getElementById('productMenu').classList.remove('hidden');
            document.getElementById('productMenuIcon').classList.remove('fa-chevron-down');
            document.getElementById('productMenuIcon').classList.add('fa-chevron-up');
        }
    </script>
@endpush