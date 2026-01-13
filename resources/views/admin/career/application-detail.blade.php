@extends('admin.layout')

@section('title', 'Detail Lamaran - ' . $application->name)
@section('page-title', 'Detail Lamaran')
@section('page-subtitle', 'Informasi lengkap pelamar')

@section('content')
    <!-- Success Alert -->
    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center"
            data-aos="fade-down">
            <i class="fas fa-check-circle mr-3 text-xl"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- Back Button -->
    <div class="mb-6" data-aos="fade-right">
        <a href="{{ route('admin.career.applications') }}"
            class="inline-flex items-center text-gray-600 hover:text-orange-600 transition">
            <i class="fas fa-arrow-left mr-2"></i>
            <span class="font-medium">Kembali ke Daftar Lamaran</span>
        </a>
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Applicant Info Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up">
                <div class="bg-gradient-to-r from-orange-500 to-red-600 p-6 text-white">
                    <div class="flex items-center gap-4">
                        <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center text-3xl font-bold">
                            {{ substr($application->name, 0, 1) }}
                        </div>
                        <div>
                            <h2 class="text-2xl font-black">{{ $application->name }}</h2>
                            <p class="text-orange-100 mt-1">Melamar sebagai {{ $application->job->title }}</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 space-y-4">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-envelope text-orange-500 text-xl mt-1"></i>
                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="font-semibold text-gray-900">{{ $application->email }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <i class="fas fa-phone text-orange-500 text-xl mt-1"></i>
                        <div>
                            <p class="text-sm text-gray-500">No. Telepon</p>
                            <p class="font-semibold text-gray-900">{{ $application->phone }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <i class="fas fa-calendar text-orange-500 text-xl mt-1"></i>
                        <div>
                            <p class="text-sm text-gray-500">Tanggal Melamar</p>
                            <p class="font-semibold text-gray-900">{{ $application->created_at->format('d F Y, H:i') }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <i class="fas fa-briefcase text-orange-500 text-xl mt-1"></i>
                        <div>
                            <p class="text-sm text-gray-500">Posisi yang Dilamar</p>
                            <p class="font-semibold text-gray-900">{{ $application->job->title }}</p>
                            <p class="text-sm text-gray-500">{{ $application->job->location }} •
                                {{ $application->job->type_label }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Message Card -->
            @if($application->message)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-comment-alt text-orange-500 mr-2"></i>
                            Pesan / Motivasi
                        </h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $application->message }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- CV Download Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-file-pdf text-orange-500 mr-2"></i>
                        Curriculum Vitae (CV)
                    </h3>
                    <div
                        class="flex items-center justify-between p-4 bg-gradient-to-r from-orange-50 to-red-50 rounded-lg border-2 border-orange-200">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-red-500 rounded-lg flex items-center justify-center">
                                <i class="fas fa-file-pdf text-white text-xl"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">{{ $application->name }}-CV.pdf</p>
                                <p class="text-sm text-gray-500">Curriculum Vitae</p>
                            </div>
                        </div>
                        <a href="{{ route('admin.career.applications.download', $application->id) }}"
                            class="bg-gradient-to-r from-orange-500 to-red-600 text-white px-6 py-3 rounded-lg hover:from-orange-600 hover:to-red-700 transition shadow-lg font-semibold">
                            <i class="fas fa-download mr-2"></i> Download
                        </a>
                    </div>
                </div>
            </div>

            <!-- Notes Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-sticky-note text-orange-500 mr-2"></i>
                        Catatan Internal
                    </h3>
                    @if($application->notes)
                        <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-200 mb-4">
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $application->notes }}</p>
                        </div>
                    @else
                        <p class="text-gray-500 italic mb-4">Belum ada catatan</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Status Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-tasks text-orange-500 mr-2"></i>
                        Status Lamaran
                    </h3>

                    <div class="mb-4">
                        <span
                            class="px-4 py-2 rounded-full text-sm font-bold bg-{{ $application->status_color }}-100 text-{{ $application->status_color }}-800">
                            {{ $application->status_label }}
                        </span>
                    </div>

                    <form action="{{ route('admin.career.applications.status', $application->id) }}" method="POST"
                        class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                Ubah Status
                            </label>
                            <select name="status" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition">
                                <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>
                                    ⏳ Menunggu Review
                                </option>
                                <option value="reviewed" {{ $application->status == 'reviewed' ? 'selected' : '' }}>
                                    👁️ Sudah Direview
                                </option>
                                <option value="shortlisted" {{ $application->status == 'shortlisted' ? 'selected' : '' }}>
                                    ⭐ Shortlist
                                </option>
                                <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>
                                    ❌ Ditolak
                                </option>
                                <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>
                                    ✅ Diterima
                                </option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                Catatan (Opsional)
                            </label>
                            <textarea name="notes" rows="4" placeholder="Tambahkan catatan internal..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition">{{ $application->notes }}</textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-3 rounded-lg hover:from-orange-600 hover:to-orange-700 transition shadow-lg font-semibold">
                            <i class="fas fa-save mr-2"></i> Update Status
                        </button>
                    </form>
                </div>
            </div>

            <!-- Quick Actions Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-bolt text-orange-500 mr-2"></i>
                        Aksi Cepat
                    </h3>
                    <div class="space-y-3">
                        <a href="mailto:{{ $application->email }}" target="_blank"
                            class="flex items-center justify-between p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition group">
                            <span class="flex items-center gap-3 text-blue-700 font-semibold">
                                <i class="fas fa-envelope"></i>
                                <span>Kirim Email</span>
                            </span>
                            <i class="fas fa-external-link-alt text-blue-400 group-hover:text-blue-600"></i>
                        </a>

                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $application->phone) }}?text=Halo%20{{ urlencode($application->name) }}%2C%20terima%20kasih%20telah%20melamar%20di%20PT%20Riau%20Food%20Lestari"
                            target="_blank"
                            class="flex items-center justify-between p-3 bg-green-50 hover:bg-green-100 rounded-lg transition group">
                            <span class="flex items-center gap-3 text-green-700 font-semibold">
                                <i class="fab fa-whatsapp"></i>
                                <span>WhatsApp</span>
                            </span>
                            <i class="fas fa-external-link-alt text-green-400 group-hover:text-green-600"></i>
                        </a>

                        <a href="tel:{{ $application->phone }}"
                            class="flex items-center justify-between p-3 bg-purple-50 hover:bg-purple-100 rounded-lg transition group">
                            <span class="flex items-center gap-3 text-purple-700 font-semibold">
                                <i class="fas fa-phone"></i>
                                <span>Telepon</span>
                            </span>
                            <i class="fas fa-external-link-alt text-purple-400 group-hover:text-purple-600"></i>
                        </a>

                        <form action="{{ route('admin.career.applications.delete', $application->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus lamaran ini? Data tidak dapat dikembalikan!');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full flex items-center justify-between p-3 bg-red-50 hover:bg-red-100 rounded-lg transition group">
                                <span class="flex items-center gap-3 text-red-700 font-semibold">
                                    <i class="fas fa-trash"></i>
                                    <span>Hapus Lamaran</span>
                                </span>
                                <i class="fas fa-exclamation-triangle text-red-400 group-hover:text-red-600"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Timeline Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-history text-orange-500 mr-2"></i>
                        Timeline
                    </h3>
                    <div class="space-y-4">
                        <div class="flex gap-3">
                            <div class="w-2 bg-orange-500 rounded-full"></div>
                            <div>
                                <p class="font-semibold text-gray-900">Lamaran Diterima</p>
                                <p class="text-sm text-gray-500">{{ $application->created_at->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                        @if($application->updated_at != $application->created_at)
                            <div class="flex gap-3">
                                <div class="w-2 bg-blue-500 rounded-full"></div>
                                <div>
                                    <p class="font-semibold text-gray-900">Status Diperbarui</p>
                                    <p class="text-sm text-gray-500">{{ $application->updated_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection