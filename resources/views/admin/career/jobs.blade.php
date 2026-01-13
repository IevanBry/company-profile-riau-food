@extends('admin.layout')

@section('title', 'Lowongan Kerja')
@section('page-title', 'Manajemen Lowongan Kerja')
@section('page-subtitle', 'Kelola lowongan pekerjaan')

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
            <h2 class="text-2xl font-bold text-gray-800">Daftar Lowongan</h2>
            <p class="text-gray-600 text-sm mt-1">Total: {{ $jobs->count() }} lowongan</p>
        </div>
        <a href="{{ route('admin.career.jobs.create') }}"
            class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-3 rounded-lg hover:from-orange-600 hover:to-orange-700 transition shadow-lg flex items-center font-semibold">
            <i class="fas fa-plus mr-2"></i> Tambah Lowongan
        </a>
    </div>

    <!-- Jobs Table -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Posisi
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Lokasi & Tipe
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Lamaran
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($jobs as $job)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 mr-3"
                                        style="background-color: {{ $job->color }}">
                                        <i class="{{ $job->icon }} text-white"></i>
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-900">{{ $job->title }}</div>
                                        <div class="text-sm text-gray-500">Order: {{ $job->order }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $job->location }}</div>
                                <div class="text-sm text-gray-500">{{ $job->type_label }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">
                                        {{ $job->applications_count }} Total
                                    </span>
                                    @if($job->pending_applications_count > 0)
                                        <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-semibold">
                                            {{ $job->pending_applications_count }} Baru
                                        </span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-2">
                                    @if($job->is_active)
                                        <span
                                            class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold w-fit">
                                            <i class="fas fa-check-circle"></i> Aktif
                                        </span>
                                    @else
                                        <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm font-semibold w-fit">
                                            <i class="fas fa-times-circle"></i> Nonaktif
                                        </span>
                                    @endif
                                    @if($job->is_featured)
                                        <span
                                            class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-semibold w-fit">
                                            <i class="fas fa-star"></i> Featured
                                        </span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.career.jobs.edit', $job->id) }}"
                                        class="bg-blue-500 text-white px-3 py-2 rounded-lg hover:bg-blue-600 transition text-sm font-medium">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.career.jobs.delete', $job->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus lowongan ini? Semua lamaran terkait juga akan terhapus!');">
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
                            <td colspan="5" class="px-6 py-12 text-center">
                                <i class="fas fa-briefcase text-6xl text-gray-300 mb-4"></i>
                                <p class="text-gray-500 text-lg">Belum ada lowongan pekerjaan</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection