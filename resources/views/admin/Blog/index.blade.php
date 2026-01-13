@extends('admin.layout')

@section('title', 'Blog Posts')
@section('page-title', 'Blog Posts')
@section('page-subtitle', 'Kelola artikel blog')

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
            <h2 class="text-2xl font-bold text-gray-800">Daftar Artikel</h2>
            <p class="text-gray-600 text-sm mt-1">Total: {{ $posts->count() }} artikel</p>
        </div>
        <a href="{{ route('admin.blog.posts.create') }}"
            class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-3 rounded-lg hover:from-orange-600 hover:to-orange-700 transition shadow-lg flex items-center font-semibold">
            <i class="fas fa-plus mr-2"></i> Tambah Artikel
        </a>
    </div>

    <!-- Posts Table -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-orange-500 to-orange-600 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold">Artikel</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold">Kategori</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold">Penulis</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold">Status</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold">Views</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold">Tanggal</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($posts as $post)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    @if($post->featured_image)
                                        <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                            alt="{{ $post->title }}"
                                            class="w-20 h-20 object-cover rounded-lg">
                                    @else
                                        <div class="w-20 h-20 bg-gradient-to-br from-orange-300 to-red-400 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-newspaper text-white text-2xl"></i>
                                        </div>
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-2 mb-1">
                                            <h3 class="font-bold text-gray-900 truncate">{{ $post->title }}</h3>
                                            @if($post->is_featured)
                                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full font-semibold flex-shrink-0">
                                                    <i class="fas fa-star"></i> Featured
                                                </span>
                                            @endif
                                        </div>
                                        <p class="text-sm text-gray-600 line-clamp-2">{{ $post->excerpt }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1 bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">
                                    @if($post->category->icon)
                                        {{ $post->category->icon }}
                                    @endif
                                    {{ $post->category->name }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center text-white text-xs font-bold">
                                        {{ substr($post->author->name, 0, 1) }}
                                    </div>
                                    <span class="text-sm font-medium text-gray-700">{{ $post->author->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($post->is_published)
                                    <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        <i class="fas fa-check-circle"></i> Published
                                    </span>
                                @else
                                    <span class="inline-block bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        <i class="fas fa-clock"></i> Draft
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-1 text-gray-600">
                                    <i class="fas fa-eye text-sm"></i>
                                    <span class="font-semibold">{{ number_format($post->views_count) }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="text-sm text-gray-600">
                                    <div class="font-semibold">{{ $post->published_at ? $post->published_at->format('d M Y') : '-' }}</div>
                                    <div class="text-xs text-gray-500">{{ $post->reading_time ?? '5 min' }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('blog.show', $post->slug) }}" target="_blank"
                                        class="bg-gray-100 text-gray-700 px-3 py-2 rounded-lg hover:bg-gray-200 transition text-sm font-medium"
                                        title="Preview">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.blog.posts.edit', $post->id) }}"
                                        class="bg-blue-500 text-white px-3 py-2 rounded-lg hover:bg-blue-600 transition text-sm font-medium">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.blog.posts.delete', $post->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus artikel ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-3 py-2 rounded-lg hover:bg-red-600 transition text-sm font-medium">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                                <h3 class="text-xl font-bold text-gray-700 mb-2">Belum Ada Artikel</h3>
                                <p class="text-gray-500 mb-6">Mulai dengan menambahkan artikel pertama Anda</p>
                                <a href="{{ route('admin.blog.posts.create') }}"
                                    class="inline-block bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-3 rounded-lg hover:from-orange-600 hover:to-orange-700 transition shadow-lg font-semibold">
                                    <i class="fas fa-plus mr-2"></i> Tambah Artikel
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush