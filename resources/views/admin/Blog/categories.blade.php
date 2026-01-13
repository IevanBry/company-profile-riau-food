{{-- resources/views/admin/blog/categories.blade.php --}}
@extends('admin.layout')

@section('title', 'Kategori Blog')
@section('page-title', 'Kategori Blog')
@section('page-subtitle', 'Kelola kategori blog dan artikel')

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
            <h2 class="text-2xl font-bold text-gray-800">Daftar Kategori Blog</h2>
            <p class="text-gray-600 text-sm mt-1">Total: {{ $categories->count() }} kategori</p>
        </div>
        <a href="{{ route('admin.blog.categories.create') }}"
            class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-lg hover:from-blue-600 hover:to-blue-700 transition shadow-lg flex items-center font-semibold">
            <i class="fas fa-plus mr-2"></i> Tambah Kategori
        </a>
    </div>

    <!-- Categories Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($categories as $category)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition" data-aos="fade-up"
                data-aos-delay="{{ $loop->index * 100 }}">

                <!-- Header with Icon/Color -->
                <div class="p-6 {{ $category->color ?? 'bg-gradient-to-r from-blue-500 to-purple-600' }} text-white">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center space-x-3">
                            @if($category->icon)
                                <span class="text-4xl">{{ $category->icon }}</span>
                            @else
                                <i class="fas fa-folder text-4xl opacity-80"></i>
                            @endif
                            <div>
                                <h3 class="text-xl font-bold">{{ $category->name }}</h3>
                                <span class="text-xs opacity-90">{{ $category->slug }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Body -->
                <div class="p-6">
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        {{ $category->description ?? 'Tidak ada deskripsi' }}
                    </p>

                    <!-- Stats -->
                    <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-200">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">{{ $category->posts_count ?? 0 }}</div>
                            <div class="text-xs text-gray-500">Artikel</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-purple-600">{{ $category->order }}</div>
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
                        <a href="{{ route('admin.blog.categories.edit', $category->id) }}"
                            class="flex-1 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition text-center text-sm font-medium">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.blog.categories.delete', $category->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus kategori ini? Semua artikel dalam kategori ini juga akan terhapus!');"
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
                <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-bold text-gray-700 mb-2">Belum Ada Kategori Blog</h3>
                <p class="text-gray-500 mb-6">Mulai dengan menambahkan kategori blog pertama Anda</p>
                <a href="{{ route('admin.blog.categories.create') }}"
                    class="inline-block bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-lg hover:from-blue-600 hover:to-blue-700 transition shadow-lg font-semibold">
                    <i class="fas fa-plus mr-2"></i> Tambah Kategori
                </a>
            </div>
        @endforelse
    </div>
@endsection

@push('scripts')
    <script>
        function toggleBlogMenu() {
            const menu = document.getElementById('blogMenu');
            const icon = document.getElementById('blogMenuIcon');
            menu.classList.toggle('hidden');
            icon.classList.toggle('fa-chevron-down');
            icon.classList.toggle('fa-chevron-up');
        }

        // Auto open if on blog pages
        if (window.location.pathname.includes('/admin/blog')) {
            const blogMenu = document.getElementById('blogMenu');
            const blogIcon = document.getElementById('blogMenuIcon');
            if (blogMenu) {
                blogMenu.classList.remove('hidden');
                blogIcon.classList.remove('fa-chevron-down');
                blogIcon.classList.add('fa-chevron-up');
            }
        }
    </script>
@endpush