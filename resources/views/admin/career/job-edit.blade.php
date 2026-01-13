@extends('admin.layout')

@section('title', 'Edit Lowongan Kerja')
@section('page-title', 'Edit Lowongan Kerja')
@section('page-subtitle', 'Perbarui informasi lowongan')

@section('content')
    <div class="mb-6" data-aos="fade-right">
        <a href="{{ route('admin.career.jobs') }}"
            class="inline-flex items-center text-gray-600 hover:text-orange-600 transition">
            <i class="fas fa-arrow-left mr-2"></i>
            <span class="font-medium">Kembali</span>
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up">
        <form action="{{ route('admin.career.jobs.update', $job->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="p-8">
                <!-- Job Info Badge -->
                <div class="mb-6 p-4 bg-blue-50 border-l-4 border-blue-500 rounded-lg">
                    <div class="flex items-center justify-between flex-wrap gap-3">
                        <div>
                            <p class="text-sm text-gray-600">
                                <span class="font-semibold">Dibuat:</span> {{ $job->created_at->format('d M Y, H:i') }}
                            </p>
                            <p class="text-sm text-gray-600">
                                <span class="font-semibold">Total Lamaran:</span> {{ $job->applications_count ?? 0 }}
                            </p>
                        </div>
                        <div class="flex items-center gap-2">
                            @if($job->is_active)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">
                                    <i class="fas fa-check-circle"></i> Aktif
                                </span>
                            @endif
                            @if($job->is_featured)
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold">
                                    <i class="fas fa-star"></i> Featured
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Basic Info -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-info-circle text-orange-500 mr-3"></i>
                        Informasi Dasar
                    </h3>
                    <div class="grid gap-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                Nama Posisi <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="title" value="{{ old('title', $job->title) }}" required
                                placeholder="Contoh: Sales Marketing"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition @error('title') border-red-500 @enderror">
                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Slug Preview -->
                        <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                            <p class="text-xs text-gray-500 mb-1">URL Slug:</p>
                            <p class="text-sm text-gray-700 font-mono">{{ $job->slug }}</p>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">
                                    Lokasi <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="location" value="{{ old('location', $job->location) }}" required
                                    placeholder="Contoh: Pekanbaru"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition @error('location') border-red-500 @enderror">
                                @error('location')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">
                                    Tipe Pekerjaan <span class="text-red-500">*</span>
                                </label>
                                <select name="type" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition @error('type') border-red-500 @enderror">
                                    <option value="">Pilih Tipe</option>
                                    <option value="full_time" {{ old('type', $job->type) == 'full_time' ? 'selected' : '' }}>
                                        Full Time</option>
                                    <option value="part_time" {{ old('type', $job->type) == 'part_time' ? 'selected' : '' }}>
                                        Part Time</option>
                                    <option value="contract" {{ old('type', $job->type) == 'contract' ? 'selected' : '' }}>
                                        Contract</option>
                                    <option value="internship" {{ old('type', $job->type) == 'internship' ? 'selected' : '' }}>Internship</option>
                                </select>
                                @error('type')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                Deskripsi Pekerjaan <span class="text-red-500">*</span>
                            </label>
                            <textarea name="description" rows="4" required placeholder="Jelaskan tentang posisi ini..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition @error('description') border-red-500 @enderror">{{ old('description', $job->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Requirements & Responsibilities -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-list-check text-orange-500 mr-3"></i>
                        Persyaratan & Tanggung Jawab
                    </h3>
                    <div class="grid gap-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Persyaratan</label>
                            <textarea name="requirements" rows="5"
                                placeholder="- Minimal D3/S1&#10;- Pengalaman 1-2 tahun&#10;- Menguasai MS Office"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition font-mono text-sm @error('requirements') border-red-500 @enderror">{{ old('requirements', $job->requirements) }}</textarea>
                            @error('requirements')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Tanggung Jawab</label>
                            <textarea name="responsibilities" rows="5"
                                placeholder="- Mengelola tim sales&#10;- Membuat laporan bulanan&#10;- Mencapai target penjualan"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition font-mono text-sm @error('responsibilities') border-red-500 @enderror">{{ old('responsibilities', $job->responsibilities) }}</textarea>
                            @error('responsibilities')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Skills / Keahlian</label>
                            <input type="text" name="skills" value="{{ old('skills', $job->skills_string) }}"
                                placeholder="Komunikasi, Negosiasi, MS Office, Bahasa Inggris"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition @error('skills') border-red-500 @enderror">
                            @error('skills')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-gray-500 text-sm mt-1">Pisahkan dengan koma (,)</p>
                        </div>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-cog text-orange-500 mr-3"></i>
                        Informasi Tambahan
                    </h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Range Gaji (Opsional)</label>
                            <input type="text" name="salary_range" value="{{ old('salary_range', $job->salary_range) }}"
                                placeholder="Contoh: Rp 5.000.000 - Rp 7.000.000"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Urutan Tampil</label>
                            <input type="number" name="order" value="{{ old('order', $job->order) }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition">
                            <p class="text-gray-500 text-sm mt-1">Semakin kecil angka, semakin atas posisinya</p>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Icon (Font Awesome)</label>
                            <input type="text" name="icon" value="{{ old('icon', $job->icon) }}"
                                placeholder="fas fa-briefcase"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition">
                            <p class="text-gray-500 text-sm mt-1">Contoh: fas fa-truck, fas fa-user-tie</p>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Warna (Hex Code)</label>
                            <input type="color" name="color" value="{{ old('color', $job->color) }}"
                                class="w-full h-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition">
                        </div>
                    </div>
                </div>

                <!-- Status Options -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-toggle-on text-orange-500 mr-3"></i>
                        Status
                    </h3>
                    <div class="space-y-4">
                        <label class="flex items-center space-x-3 cursor-pointer group">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $job->is_active) ? 'checked' : '' }}
                                class="w-5 h-5 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                            <div>
                                <span class="text-gray-700 font-semibold group-hover:text-orange-600 transition">
                                    <i class="fas fa-check-circle text-green-500"></i> Aktif
                                </span>
                                <p class="text-gray-500 text-sm">Lowongan akan ditampilkan di website</p>
                            </div>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer group">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $job->is_featured) ? 'checked' : '' }}
                                class="w-5 h-5 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                            <div>
                                <span class="text-gray-700 font-semibold group-hover:text-orange-600 transition">
                                    <i class="fas fa-star text-yellow-500"></i> Featured
                                </span>
                                <p class="text-gray-500 text-sm">Tampilkan sebagai lowongan unggulan</p>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="bg-gray-50 px-8 py-6 flex flex-col sm:flex-row gap-4 justify-end">
                <a href="{{ route('admin.career.jobs') }}"
                    class="px-6 py-3 border border-gray-300 rounded-lg hover:bg-gray-100 transition text-center font-semibold text-gray-700">
                    <i class="fas fa-times mr-2"></i> Batal
                </a>
                <button type="submit"
                    class="px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg hover:from-orange-600 hover:to-orange-700 transition shadow-lg font-semibold">
                    <i class="fas fa-save mr-2"></i> Perbarui Lowongan
                </button>
            </div>
        </form>
    </div>
@endsection