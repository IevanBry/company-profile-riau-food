@extends('layouts.admin')

@section('title', 'Edit Halaman Perusahaan')
@section('page-title', 'Edit Halaman Perusahaan')
@section('page-subtitle', 'Kelola konten halaman Tentang Perusahaan')

@section('content')
    <div class="space-y-6">
        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-sm" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-xl mr-3"></i>
                    <p class="font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <form action="{{ route('admin.company.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Profile Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden" data-aos="fade-up">
                <div class="bg-gradient-to-r from-orange-500 to-red-600 px-6 py-4">
                    <h2 class="text-xl font-bold text-white flex items-center">
                        <i class="fas fa-building mr-3"></i>
                        Profil Perusahaan
                    </h2>
                </div>

                <div class="p-6 space-y-6">
                    <!-- Company Image -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fas fa-image mr-2 text-orange-500"></i>Gambar Perusahaan
                        </label>
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <img id="companyImagePreview"
                                    src="{{ $company->image ?? 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=800' }}"
                                    alt="Company Image" class="w-40 h-40 object-cover rounded-xl border-2 border-gray-200">
                            </div>
                            <div class="flex-1">
                                <input type="file" name="image" id="companyImage" accept="image/*"
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100 cursor-pointer">
                                <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG. Maksimal 2MB. Rekomendasi: 800x600px
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Company Description -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fas fa-align-left mr-2 text-orange-500"></i>Deskripsi Perusahaan (Paragraf 1)
                        </label>
                        <textarea name="description_1" rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition"
                            placeholder="Masukkan deskripsi perusahaan paragraf 1...">{{ old('description_1', $company->description_1 ?? 'PT. Riau Food Lestari adalah perusahaan yang bergerak di bidang importir dan distributor produk kebutuhan sehari-hari berkualitas tinggi. Kami berlokasi di Pekanbaru, Riau dan telah melayani berbagai wilayah di Indonesia.') }}</textarea>
                        @error('description_1')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fas fa-align-left mr-2 text-orange-500"></i>Deskripsi Perusahaan (Paragraf 2)
                        </label>
                        <textarea name="description_2" rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition"
                            placeholder="Masukkan deskripsi perusahaan paragraf 2...">{{ old('description_2', $company->description_2 ?? 'Dengan pengalaman lebih dari 10 tahun, kami memiliki komitmen kuat dalam menyediakan produk original dan berkualitas dari berbagai supplier terpercaya internasional. Jaringan distribusi kami mencakup seluruh Indonesia dengan sistem logistik yang handal dan profesional.') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fas fa-align-left mr-2 text-orange-500"></i>Deskripsi Perusahaan (Paragraf 3)
                        </label>
                        <textarea name="description_3" rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition"
                            placeholder="Masukkan deskripsi perusahaan paragraf 3...">{{ old('description_3', $company->description_3 ?? 'Kami percaya bahwa kepercayaan pelanggan adalah aset terbesar kami. Oleh karena itu, setiap produk yang kami distribusikan dijamin 100% original dan telah melalui proses quality control yang ketat.') }}</textarea>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                <i class="fas fa-calendar mr-2 text-orange-500"></i>Tahun Berdiri
                            </label>
                            <input type="text" name="years_established"
                                value="{{ old('years_established', $company->years_established ?? '10+') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition"
                                placeholder="10+">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                <i class="fas fa-box mr-2 text-blue-500"></i>Jumlah Produk
                            </label>
                            <input type="text" name="total_products"
                                value="{{ old('total_products', $company->total_products ?? '50+') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                placeholder="50+">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                <i class="fas fa-certificate mr-2 text-green-500"></i>Garansi Original
                            </label>
                            <input type="text" name="original_guarantee"
                                value="{{ old('original_guarantee', $company->original_guarantee ?? '100%') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                                placeholder="100%">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vision Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden" data-aos="fade-up"
                data-aos-delay="100">
                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
                    <h2 class="text-xl font-bold text-white flex items-center">
                        <i class="fas fa-eye mr-3"></i>
                        Visi Perusahaan
                    </h2>
                </div>

                <div class="p-6">
                    <textarea name="vision" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        placeholder="Masukkan visi perusahaan...">{{ old('vision', $company->vision ?? 'Menjadi importir dan distributor terpercaya yang menyediakan produk berkualitas tinggi dengan harga kompetitif untuk seluruh Indonesia, serta membangun kemitraan bisnis yang saling menguntungkan.') }}</textarea>
                    @error('vision')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Mission Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden" data-aos="fade-up"
                data-aos-delay="200">
                <div class="bg-gradient-to-r from-purple-500 to-pink-600 px-6 py-4">
                    <h2 class="text-xl font-bold text-white flex items-center">
                        <i class="fas fa-bullseye mr-3"></i>
                        Misi Perusahaan
                    </h2>
                </div>

                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Misi 1</label>
                        <input type="text" name="mission_1"
                            value="{{ old('mission_1', $company->mission_1 ?? 'Menyediakan produk import original dengan jaminan kualitas 100%') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                            placeholder="Misi 1">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Misi 2</label>
                        <input type="text" name="mission_2"
                            value="{{ old('mission_2', $company->mission_2 ?? 'Memberikan harga kompetitif dan layanan terbaik kepada pelanggan') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                            placeholder="Misi 2">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Misi 3</label>
                        <input type="text" name="mission_3"
                            value="{{ old('mission_3', $company->mission_3 ?? 'Membangun jaringan distribusi yang efisien ke seluruh Indonesia') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                            placeholder="Misi 3">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Misi 4</label>
                        <input type="text" name="mission_4"
                            value="{{ old('mission_4', $company->mission_4 ?? 'Menciptakan peluang kemitraan bisnis yang menguntungkan') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                            placeholder="Misi 4">
                    </div>
                </div>
            </div>

            <!-- Contact Information Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden" data-aos="fade-up"
                data-aos-delay="300">
                <div class="bg-gradient-to-r from-green-500 to-teal-600 px-6 py-4">
                    <h2 class="text-xl font-bold text-white flex items-center">
                        <i class="fas fa-map-marker-alt mr-3"></i>
                        Informasi Kontak
                    </h2>
                </div>

                <div class="p-6 space-y-6">
                    <!-- Address -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fas fa-map-marker-alt mr-2 text-orange-500"></i>Alamat Lengkap
                        </label>
                        <textarea name="address" rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                            placeholder="Masukkan alamat lengkap...">{{ old('address', $company->address ?? 'Jl. Soekarno Hatta, Gang Nusa Indah, Pekanbaru, Riau 28111, Indonesia') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Phone -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                <i class="fas fa-phone mr-2 text-blue-500"></i>Nomor Telepon (WhatsApp)
                            </label>
                            <input type="text" name="phone"
                                value="{{ old('phone', $company->phone ?? '+62 823-9001-7777') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                placeholder="+62 xxx-xxxx-xxxx">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                <i class="fas fa-envelope mr-2 text-purple-500"></i>Email
                            </label>
                            <input type="email" name="email"
                                value="{{ old('email', $company->email ?? 'info@riaufoodlestari.com') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                placeholder="email@perusahaan.com">
                        </div>
                    </div>

                    <!-- Google Maps Embed URL -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fas fa-map mr-2 text-red-500"></i>Google Maps Embed URL
                        </label>
                        <input type="url" name="map_url"
                            value="{{ old('map_url', $company->map_url ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6550706411076!2d101.41760897496472!3d0.5183089994766221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ab005ec19403%3A0x25e4fee04beb5314!2sPT%20Riau%20Food%20Lestari%20(%20Kantor%20Admin%20RFL%20)!5e0!3m2!1sen!2sid!4v1764994157028!5m2!1sen!2sid') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition"
                            placeholder="https://www.google.com/maps/embed?pb=...">
                        <p class="text-xs text-gray-500 mt-2">
                            Dapatkan embed URL dari Google Maps: Share → Embed a map → Copy HTML
                        </p>
                    </div>

                    <!-- Operating Hours -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                <i class="fas fa-clock mr-2 text-orange-500"></i>Jam Operasional (Senin - Sabtu)
                            </label>
                            <input type="text" name="operating_hours"
                                value="{{ old('operating_hours', $company->operating_hours ?? '08:30 - 17:00 WIB') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition"
                                placeholder="08:30 - 17:00 WIB">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                <i class="fas fa-calendar-times mr-2 text-red-500"></i>Status (Minggu & Hari Libur)
                            </label>
                            <input type="text" name="holiday_status"
                                value="{{ old('holiday_status', $company->holiday_status ?? 'Tutup') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition"
                                placeholder="Tutup" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-4" data-aos="fade-up" data-aos-delay="400">
                <a href="{{ route('company') }}" target="_blank"
                    class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition flex items-center gap-2">
                    <i class="fas fa-external-link-alt"></i>
                    Preview Halaman
                </a>
                <button type="submit"
                    class="px-8 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-lg font-bold hover:from-orange-600 hover:to-red-700 transition flex items-center gap-2 shadow-lg hover:shadow-xl">
                    <i class="fas fa-save"></i>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        // Preview Image
        document.getElementById('companyImage').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('companyImagePreview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush