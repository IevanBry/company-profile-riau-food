@extends('admin.layout')

@section('title', 'Lamaran Kerja')
@section('page-title', 'Manajemen Lamaran Kerja')
@section('page-subtitle', 'Kelola lamaran yang masuk')

@section('content')
    <!-- Success Alert -->
    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center"
            data-aos="fade-down">
            <i class="fas fa-check-circle mr-3 text-xl"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8" data-aos="fade-up">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-semibold">Total Lamaran</p>
                    <p class="text-3xl font-black mt-2">{{ $stats['total'] }}</p>
                </div>
                <i class="fas fa-file-alt text-4xl text-white/30"></i>
            </div>
        </div>

        <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-100 text-sm font-semibold">Pending</p>
                    <p class="text-3xl font-black mt-2">{{ $stats['pending'] }}</p>
                </div>
                <i class="fas fa-clock text-4xl text-white/30"></i>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-semibold">Reviewed</p>
                    <p class="text-3xl font-black mt-2">{{ $stats['reviewed'] }}</p>
                </div>
                <i class="fas fa-eye text-4xl text-white/30"></i>
            </div>
        </div>

        <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-yellow-100 text-sm font-semibold">Shortlisted</p>
                    <p class="text-3xl font-black mt-2">{{ $stats['shortlisted'] }}</p>
                </div>
                <i class="fas fa-star text-4xl text-white/30"></i>
            </div>
        </div>
    </div>

    <!-- Applications Table -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Pelamar
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Posisi
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal
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
                    @forelse($applications as $application)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div>
                                    <div class="font-bold text-gray-900">{{ $application->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $application->email }}</div>
                                    <div class="text-sm text-gray-500">{{ $application->phone }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-900">{{ $application->job->title }}</div>
                                <div class="text-sm text-gray-500">{{ $application->job->location }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $application->created_at->format('d M Y') }}</div>
                                <div class="text-sm text-gray-500">{{ $application->created_at->format('H:i') }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 rounded-full text-sm font-semibold bg-{{ $application->status_color }}-100 text-{{ $application->status_color }}-800">
                                    {{ $application->status_label }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.career.applications.show', $application->id) }}"
                                        class="bg-blue-500 text-white px-3 py-2 rounded-lg hover:bg-blue-600 transition text-sm font-medium">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.career.applications.download', $application->id) }}"
                                        class="bg-green-500 text-white px-3 py-2 rounded-lg hover:bg-green-600 transition text-sm font-medium">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <form action="{{ route('admin.career.applications.delete', $application->id) }}"
                                        method="POST" onsubmit="return confirm('Yakin ingin menghapus lamaran ini?');">
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
                                <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                                <p class="text-gray-500 text-lg">Belum ada lamaran masuk</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($applications->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $applications->links() }}
            </div>
        @endif
    </div>
@endsection