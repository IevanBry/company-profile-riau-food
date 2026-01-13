@extends('admin.layout')

@section('title', 'Edit Konten Home')
@section('page-title', 'Edit Konten Home')
@section('page-subtitle', 'Kelola konten halaman beranda website')

@section('content')
    <!-- Success Alert -->
    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center"
            data-aos="fade-down">
            <i class="fas fa-check-circle mr-3 text-xl"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

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

    <form action="{{ route('admin.home.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Hero Section -->
        <div class="bg-white rounded-xl shadow-lg mb-6" data-aos="fade-up">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white p-6 rounded-t-xl">
                <h3 class="text-xl font-bold flex items-center">
                    <i class="fas fa-star mr-3"></i> Hero Section
                </h3>
                <p class="text-sm text-orange-100 mt-1">Bagian utama yang pertama dilihat pengunjung</p>
            </div>
            <div class="p-6 space-y-5">
                <!-- Badge Text -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-tag text-orange-500 mr-1"></i> Badge Text
                    </label>
                    <input type="text" name="hero_badge" value="{{ old('hero_badge', $content->hero_badge) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition"
                        placeholder="✨ Importir & Distributor Terpercaya">
                    <p class="text-xs text-gray-500 mt-1">Teks badge di atas judul hero</p>
                </div>

                <!-- Hero Title -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-heading text-orange-500 mr-1"></i> Judul Utama
                    </label>
                    <input type="text" name="hero_title" value="{{ old('hero_title', $content->hero_title) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition text-lg font-semibold"
                        placeholder="Distributor Produk Berkualitas Terpercaya">
                    <p class="text-xs text-gray-500 mt-1">Judul besar di hero section</p>
                </div>

                <!-- Hero Description -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-align-left text-orange-500 mr-1"></i> Deskripsi
                    </label>
                    <textarea name="hero_description" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition"
                        placeholder="Deskripsi singkat tentang perusahaan...">{{ old('hero_description', $content->hero_description) }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">Deskripsi di bawah judul hero</p>
                </div>

                <!-- Hero Image Upload -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-image text-orange-500 mr-1"></i> Gambar Hero
                    </label>

                    @if($content->hero_image)
                        <div class="mb-4">
                            <p class="text-xs text-gray-600 mb-2">Gambar Saat Ini:</p>
                            <div class="relative inline-block">
                                <img src="{{ asset('storage/' . $content->hero_image) }}" alt="Hero Image"
                                    class="max-w-md w-full rounded-lg shadow-md border-2 border-gray-200">
                                <div class="mt-2">
                                    <label class="flex items-center cursor-pointer text-sm text-red-600 hover:text-red-700">
                                        <input type="checkbox" name="remove_hero_image" value="1" class="mr-2">
                                        Hapus gambar ini
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="mt-2">
                        <input type="file" name="hero_image" id="heroImageInput" accept="image/*"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
                        <p class="text-xs text-gray-500 mt-1">
                            Format: JPG, PNG, atau GIF. Maksimal 2MB.
                            @if($content->hero_image)
                                Upload gambar baru untuk mengganti gambar yang ada
                            @endif
                        </p>
                    </div>

                    <!-- Preview New Hero Image -->
                    <div id="heroImagePreview" class="mt-4 hidden">
                        <p class="text-xs text-gray-600 mb-2">Preview Gambar Baru:</p>
                        <div class="relative inline-block">
                            <img id="heroPreviewImg" src="" alt="Preview"
                                class="max-w-md w-full rounded-lg shadow-md border-2 border-orange-200">
                            <button type="button" onclick="removeHeroImage()"
                                class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-2 hover:bg-red-600 transition shadow-lg">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Hero Stats -->
                <div class="pt-5 border-t border-gray-200">
                    <h4 class="text-base font-semibold text-gray-800 mb-4">
                        <i class="fas fa-chart-line text-orange-500 mr-2"></i> Statistik Hero
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Stat 1 -->
                        <div class="bg-orange-50 p-4 rounded-lg border border-orange-200">
                            <label class="block text-xs font-semibold text-gray-600 mb-2">Statistik 1</label>
                            <input type="text" name="stat_1_number"
                                value="{{ old('stat_1_number', $content->stat_1_number) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent mb-2 font-bold text-center text-xl"
                                placeholder="10+">
                            <input type="text" name="stat_1_text" value="{{ old('stat_1_text', $content->stat_1_text) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent text-center text-sm"
                                placeholder="Tahun Pengalaman">
                        </div>

                        <!-- Stat 2 -->
                        <div class="bg-orange-50 p-4 rounded-lg border border-orange-200">
                            <label class="block text-xs font-semibold text-gray-600 mb-2">Statistik 2</label>
                            <input type="text" name="stat_2_number"
                                value="{{ old('stat_2_number', $content->stat_2_number) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent mb-2 font-bold text-center text-xl"
                                placeholder="50+">
                            <input type="text" name="stat_2_text" value="{{ old('stat_2_text', $content->stat_2_text) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent text-center text-sm"
                                placeholder="Produk Pilihan">
                        </div>

                        <!-- Stat 3 -->
                        <div class="bg-orange-50 p-4 rounded-lg border border-orange-200">
                            <label class="block text-xs font-semibold text-gray-600 mb-2">Statistik 3</label>
                            <input type="text" name="stat_3_number"
                                value="{{ old('stat_3_number', $content->stat_3_number) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent mb-2 font-bold text-center text-xl"
                                placeholder="100%">
                            <input type="text" name="stat_3_text" value="{{ old('stat_3_text', $content->stat_3_text) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent text-center text-sm"
                                placeholder="Produk Original">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Section -->
        <div class="bg-white rounded-xl shadow-lg mb-6" data-aos="fade-up" data-aos-delay="100">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6 rounded-t-xl">
                <h3 class="text-xl font-bold flex items-center">
                    <i class="fas fa-info-circle mr-3"></i> About Section
                </h3>
                <p class="text-sm text-blue-100 mt-1">Informasi tentang perusahaan</p>
            </div>
            <div class="p-6 space-y-5">
                <!-- About Title -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-heading text-blue-500 mr-1"></i> Judul About
                    </label>
                    <input type="text" name="about_title" value="{{ old('about_title', $content->about_title) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        placeholder="Importir & Distributor Terpercaya">
                </div>

                <!-- About Description 1 -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-paragraph text-blue-500 mr-1"></i> Deskripsi Paragraf 1
                    </label>
                    <textarea name="about_description_1" rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        placeholder="Paragraf pertama tentang perusahaan...">{{ old('about_description_1', $content->about_description_1) }}</textarea>
                </div>

                <!-- About Description 2 -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-paragraph text-blue-500 mr-1"></i> Deskripsi Paragraf 2
                    </label>
                    <textarea name="about_description_2" rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        placeholder="Paragraf kedua tentang perusahaan...">{{ old('about_description_2', $content->about_description_2) }}</textarea>
                </div>

                <!-- About Image Upload -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-image text-blue-500 mr-1"></i> Gambar About
                    </label>

                    @if($content->about_image)
                        <div class="mb-4">
                            <p class="text-xs text-gray-600 mb-2">Gambar Saat Ini:</p>
                            <div class="relative inline-block">
                                <img src="{{ asset('storage/' . $content->about_image) }}" alt="About Image"
                                    class="max-w-md w-full rounded-lg shadow-md border-2 border-gray-200">
                                <div class="mt-2">
                                    <label class="flex items-center cursor-pointer text-sm text-red-600 hover:text-red-700">
                                        <input type="checkbox" name="remove_about_image" value="1" class="mr-2">
                                        Hapus gambar ini
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="mt-2">
                        <input type="file" name="about_image" id="aboutImageInput" accept="image/*"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <p class="text-xs text-gray-500 mt-1">
                            Format: JPG, PNG, atau GIF. Maksimal 2MB.
                            @if($content->about_image)
                                Upload gambar baru untuk mengganti gambar yang ada
                            @endif
                        </p>
                    </div>

                    <!-- Preview New About Image -->
                    <div id="aboutImagePreview" class="mt-4 hidden">
                        <p class="text-xs text-gray-600 mb-2">Preview Gambar Baru:</p>
                        <div class="relative inline-block">
                            <img id="aboutPreviewImg" src="" alt="Preview"
                                class="max-w-md w-full rounded-lg shadow-md border-2 border-blue-200">
                            <button type="button" onclick="removeAboutImage()"
                                class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-2 hover:bg-red-600 transition shadow-lg">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact/CTA Section -->
        <div class="bg-white rounded-xl shadow-lg mb-6" data-aos="fade-up" data-aos-delay="200">
            <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-t-xl">
                <h3 class="text-xl font-bold flex items-center">
                    <i class="fas fa-phone mr-3"></i> Contact & CTA Section
                </h3>
                <p class="text-sm text-green-100 mt-1">Informasi kontak dan call-to-action</p>
            </div>
            <div class="p-6 space-y-5">
                <!-- CTA Title -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-bullhorn text-green-500 mr-1"></i> Judul CTA
                    </label>
                    <input type="text" name="cta_title" value="{{ old('cta_title', $content->cta_title) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                        placeholder="Tertarik Menjadi Mitra Kami?">
                </div>

                <!-- CTA Description -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-align-left text-green-500 mr-1"></i> Deskripsi CTA
                    </label>
                    <textarea name="cta_description" rows="2"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                        placeholder="Hubungi kami sekarang...">{{ old('cta_description', $content->cta_description) }}</textarea>
                </div>

                <!-- Contact Info Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Phone -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-phone text-green-500 mr-1"></i> Nomor Telepon
                        </label>
                        <input type="text" name="phone" value="{{ old('phone', $content->phone) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                            placeholder="+62 823-9001-7777">
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-envelope text-green-500 mr-1"></i> Email
                        </label>
                        <input type="email" name="email" value="{{ old('email', $content->email) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                            placeholder="info@riaufoodlestari.com">
                    </div>

                    <!-- Address -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-map-marker-alt text-green-500 mr-1"></i> Alamat
                        </label>
                        <input type="text" name="address" value="{{ old('address', $content->address) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                            placeholder="Pekanbaru, Riau, Indonesia">
                    </div>

                    <!-- Operational Hours -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-clock text-green-500 mr-1"></i> Jam Operasional
                        </label>
                        <input type="text" name="operational_hours"
                            value="{{ old('operational_hours', $content->operational_hours) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                            placeholder="Senin - Sabtu: 08.30 - 17.00 WIB">
                    </div>

                    <!-- Instagram URL -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fab fa-instagram text-green-500 mr-1"></i> URL Instagram
                        </label>
                        <input type="url" name="instagram_url" value="{{ old('instagram_url', $content->instagram_url) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                            placeholder="https://instagram.com/riaufoodlestari">
                    </div>

                    <!-- WhatsApp URL -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fab fa-whatsapp text-green-500 mr-1"></i> URL WhatsApp
                        </label>
                        <input type="url" name="whatsapp_url" value="{{ old('whatsapp_url', $content->whatsapp_url) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                            placeholder="https://wa.me/6282390017777">
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-between items-center bg-white p-6 rounded-xl shadow-lg"
            data-aos="fade-up" data-aos-delay="300">
            <a href="{{ route('admin.dashboard') }}"
                class="w-full sm:w-auto px-6 py-3 border-2 border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition flex items-center justify-center font-medium">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Dashboard
            </a>
            <button type="submit"
                class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg hover:from-orange-600 hover:to-orange-700 transition shadow-lg flex items-center justify-center font-semibold">
                <i class="fas fa-save mr-2"></i> Simpan Perubahan
            </button>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        // Preview Hero Image
        document.getElementById('heroImageInput').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('heroPreviewImg').src = e.target.result;
                    document.getElementById('heroImagePreview').classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        });

        // Remove Hero Image Preview
        function removeHeroImage() {
            document.getElementById('heroImageInput').value = '';
            document.getElementById('heroImagePreview').classList.add('hidden');
            document.getElementById('heroPreviewImg').src = '';
        }

        // Preview About Image
        document.getElementById('aboutImageInput').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('aboutPreviewImg').src = e.target.result;
                    document.getElementById('aboutImagePreview').classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        });

        // Remove About Image Preview
        function removeAboutImage() {
            document.getElementById('aboutImageInput').value = '';
            document.getElementById('aboutImagePreview').classList.add('hidden');
            document.getElementById('aboutPreviewImg').src = '';
        }
    </script>
@endpush