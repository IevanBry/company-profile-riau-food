@extends('admin.layout')

@section('title', 'Daftar Produk')
@section('page-title', 'Daftar Produk')
@section('page-subtitle', 'Kelola semua produk')

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
            <h2 class="text-2xl font-bold text-gray-800">Semua Produk</h2>
            <p class="text-gray-600 text-sm mt-1">Total: {{ $products->count() }} produk</p>
        </div>
        <a href="{{ route('admin.products.create') }}"
            class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-3 rounded-lg hover:from-orange-600 hover:to-orange-700 transition shadow-lg flex items-center font-semibold">
            <i class="fas fa-plus mr-2"></i> Tambah Produk
        </a>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-orange-500 to-orange-600 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold">Produk</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold">Kategori</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold">Ukuran</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold">Rating</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold">Status</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($products as $product)
                        <tr class="hover:bg-gray-50 transition">
                            <!-- Product Info -->
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-4">
                                    <div
                                        class="w-16 h-16 rounded-lg bg-gradient-to-br {{ $product->gradient ?? 'from-gray-200 to-gray-300' }} flex items-center justify-center">
                                        @if($product->image)
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                                class="w-full h-full object-cover rounded-lg">
                                        @else
                                            <i class="fas fa-{{ $product->icon ?? 'box' }} text-white text-2xl"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-800">{{ $product->name }}</div>
                                        <div class="text-sm text-gray-500 line-clamp-1">
                                            {{ Str::limit($product->description, 50) }}</div>
                                        @if($product->badge)
                                            <span
                                                class="inline-block mt-1 {{ $product->badge_color ?? 'bg-orange-500' }} text-white text-xs px-2 py-1 rounded">
                                                {{ $product->badge }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <!-- Category -->
                            <td class="px-6 py-4">
                                <span class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">
                                    {{ $product->category->name ?? 'N/A' }}
                                </span>
                            </td>

                            <!-- Sizes -->
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1">
                                    @php
                                        $sizes = json_decode($product->sizes, true) ?? [];
                                    @endphp
                                    @forelse($sizes as $size)
                                        <span class="inline-block bg-gray-100 text-gray-700 px-2 py-1 rounded text-xs">
                                            {{ $size }}
                                        </span>
                                    @empty
                                        <span class="text-gray-400 text-sm">-</span>
                                    @endforelse
                                </div>
                            </td>

                            <!-- Rating -->
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-1">
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <span class="font-semibold text-gray-800">{{ number_format($product->rating, 1) }}</span>
                                </div>
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4">
                                @if($product->is_active)
                                    <span
                                        class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        <i class="fas fa-check-circle"></i> Aktif
                                    </span>
                                @else
                                    <span class="inline-block bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        <i class="fas fa-times-circle"></i> Nonaktif
                                    </span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                        class="bg-blue-500 text-white px-3 py-2 rounded-lg hover:bg-blue-600 transition text-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.products.delete', $product->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-3 py-2 rounded-lg hover:bg-red-600 transition text-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <i class="fas fa-box-open text-6xl text-gray-300 mb-4"></i>
                                <h3 class="text-xl font-bold text-gray-700 mb-2">Belum Ada Produk</h3>
                                <p class="text-gray-500 mb-6">Mulai dengan menambahkan produk pertama Anda</p>
                                <a href="{{ route('admin.products.create') }}"
                                    class="inline-block bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-3 rounded-lg hover:from-orange-600 hover:to-orange-700 transition shadow-lg font-semibold">
                                    <i class="fas fa-plus mr-2"></i> Tambah Produk
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
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

        if (window.location.pathname.includes('/admin/products')) {
            document.getElementById('productMenu').classList.remove('hidden');
            document.getElementById('productMenuIcon').classList.remove('fa-chevron-down');
            document.getElementById('productMenuIcon').classList.add('fa-chevron-up');
        }
    </script>
@endpush