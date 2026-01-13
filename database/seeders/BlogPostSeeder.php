<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();

        if (!$admin) {
            $this->command->error('Admin user not found! Please run UserSeeder first.');
            return;
        }

        $categories = BlogCategory::all();

        if ($categories->isEmpty()) {
            $this->command->error('Blog categories not found! Please run BlogCategorySeeder first.');
            return;
        }

        $posts = [
            // Tips & Tricks Category
            [
                'category' => 'Tips & Tricks',
                'title' => 'Cara Memilih Body Shampoo yang Tepat untuk Kulit Anda',
                'excerpt' => 'Panduan lengkap memilih body shampoo sesuai jenis kulit. Ketahui tips penting sebelum membeli produk perawatan tubuh Anda.',
                'content' => "Memilih body shampoo yang tepat adalah langkah penting dalam rutinitas perawatan kulit Anda. Produk yang tidak sesuai dapat menyebabkan berbagai masalah seperti kulit kering, iritasi, atau bahkan alergi.

Langkah Pertama: Kenali Jenis Kulit Anda

Setiap jenis kulit memiliki kebutuhan yang berbeda:
- Kulit Normal: Membutuhkan produk yang menjaga keseimbangan alami
- Kulit Kering: Memerlukan formula yang lebih melembabkan dan kaya nutrisi
- Kulit Berminyak: Cocok dengan produk yang dapat mengontrol minyak berlebih
- Kulit Sensitif: Membutuhkan produk hypoallergenic dan bebas pewangi keras

Perhatikan Kandungan Bahan

Bahan-bahan dalam body shampoo sangat menentukan kualitas dan efektivitas produk. Pilih produk yang mengandung:
- Natural oils (coconut, argan, jojoba)
- Vitamin E dan C untuk antioksidan
- Aloe vera untuk menenangkan kulit
- Shea butter untuk kelembaban ekstra

Hindari bahan berbahaya seperti:
- Sulfat keras (SLS/SLES)
- Paraben yang dapat mengganggu hormon
- Pewarna sintetis berlebihan
- Alkohol denaturing yang membuat kulit kering

Tips Penggunaan

Gunakan produk secara konsisten dan perhatikan reaksi kulit Anda. Jika terjadi iritasi, hentikan penggunaan dan konsultasikan dengan dokter kulit.",
                'reading_time' => '5 min read',
                'tags' => ['Body Care', 'Tips Kecantikan', 'Perawatan Kulit', 'Kesehatan'],
                'is_featured' => true,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'category' => 'Tips & Tricks',
                'title' => '7 Kesalahan Umum dalam Perawatan Tubuh yang Harus Dihindari',
                'excerpt' => 'Temukan kesalahan-kesalahan umum dalam rutinitas perawatan tubuh dan bagaimana cara memperbaikinya untuk hasil maksimal.',
                'content' => "Banyak orang tidak menyadari bahwa mereka melakukan kesalahan dalam rutinitas perawatan tubuh sehari-hari. Berikut adalah 7 kesalahan yang sering terjadi:

1. Mandi dengan Air Terlalu Panas
Air panas memang menyenangkan, tetapi dapat menghilangkan minyak alami kulit dan menyebabkan kekeringan. Gunakan air hangat suam-suam kuku.

2. Menggunakan Terlalu Banyak Produk
Lebih banyak tidak selalu lebih baik. Gunakan produk secukupnya sesuai petunjuk.

3. Tidak Melembabkan Setelah Mandi
Aplikasikan pelembab segera setelah mandi saat kulit masih lembab untuk hasil optimal.

4. Menggosok Kulit Terlalu Keras
Eksfoliasi penting, tetapi jangan terlalu kasar. Lakukan dengan lembut 2-3 kali seminggu.

5. Mengabaikan Area Tertentu
Jangan lupakan leher, punggung, dan tumit yang juga membutuhkan perawatan.

6. Tidak Membaca Label Produk
Selalu periksa kandungan bahan untuk menghindari alergen atau bahan yang tidak cocok.

7. Tidak Konsisten
Hasil terbaik datang dari konsistensi. Buatlah rutinitas perawatan yang realistis dan patuhi.",
                'reading_time' => '7 min read',
                'tags' => ['Tips', 'Perawatan Tubuh', 'Kesalahan Umum', 'Beauty'],
                'is_featured' => false,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(5),
            ],

            // Berita Produk Category
            [
                'category' => 'Berita Produk',
                'title' => 'Peluncuran Kusuka Body Shampoo Varian Terbaru',
                'excerpt' => 'Kami dengan bangga memperkenalkan varian terbaru dari Kusuka Body Shampoo dengan formula yang lebih menyegarkan dan nutrisi lengkap.',
                'content' => "PT. Riau Food Lestari dengan bangga memperkenalkan varian terbaru dari rangkaian Kusuka Body Shampoo yang telah dipercaya oleh jutaan konsumen di Indonesia.

Varian Terbaru yang Diluncurkan

1. Kusuka Sakura Blossom
Formula istimewa dengan ekstrak bunga sakura yang memberikan kesegaran dan aroma yang menenangkan. Cocok untuk semua jenis kulit.

2. Kusuka Green Tea
Mengandung antioksidan tinggi dari ekstrak teh hijau yang membantu melindungi kulit dari radikal bebas dan polusi.

3. Kusuka Ocean Fresh
Kesegaran laut dalam setiap tetes dengan mineral laut yang menyegarkan dan menutrisi kulit Anda.

Keunggulan Formula Baru

- pH balanced untuk menjaga kesehatan kulit
- Dermatologically tested
- Tidak mengandung paraben
- Dengan moisturizer alami
- Aroma yang tahan lama
- Busa yang lembut dan melimpah

Produk ini sudah tersedia di seluruh distributor kami. Hubungi kami untuk informasi pemesanan!",
                'reading_time' => '4 min read',
                'tags' => ['Produk Baru', 'Kusuka', 'Body Shampoo', 'Peluncuran'],
                'is_featured' => true,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(1),
            ],

            // Kesehatan & Kecantikan Category
            [
                'category' => 'Kesehatan & Kecantikan',
                'title' => 'Manfaat Mandi Pagi untuk Kesehatan Kulit dan Mental',
                'excerpt' => 'Mandi pagi bukan hanya untuk kebersihan, tetapi juga memiliki manfaat luar biasa untuk kesehatan kulit dan kesejahteraan mental Anda.',
                'content' => "Memulai hari dengan mandi pagi memiliki banyak manfaat yang mungkin tidak Anda sadari. Lebih dari sekadar membersihkan tubuh, mandi pagi dapat meningkatkan kesehatan kulit dan mental Anda.

Manfaat untuk Kesehatan Kulit

1. Membersihkan Pori-pori
Mandi pagi membantu membersihkan kotoran dan minyak yang menumpuk saat tidur, mencegah pori-pori tersumbat.

2. Meningkatkan Sirkulasi Darah
Air hangat merangsang aliran darah ke kulit, memberikan nutrisi dan oksigen yang lebih baik.

3. Menyegarkan Kulit
Kulit terlihat lebih segar dan bercahaya setelah mandi pagi dengan produk yang tepat.

Manfaat untuk Kesehatan Mental

1. Meningkatkan Mood
Mandi pagi dapat meningkatkan produksi endorfin, hormon yang membuat Anda merasa bahagia.

2. Mengurangi Stres
Sensasi air yang mengalir memiliki efek menenangkan dan mengurangi tingkat stres.

3. Meningkatkan Fokus
Mandi pagi membantu membangunkan tubuh dan pikiran, meningkatkan konsentrasi sepanjang hari.

Tips Mandi Pagi yang Optimal

- Gunakan air hangat, bukan panas
- Pilih body shampoo dengan aroma yang menyegarkan
- Luangkan waktu 10-15 menit untuk menikmati momen ini
- Akhiri dengan bilasan air dingin untuk menutup pori-pori
- Aplikasikan pelembab setelah mandi

Jadikan mandi pagi sebagai ritual harian yang menyenangkan untuk memulai hari dengan energi positif!",
                'reading_time' => '6 min read',
                'tags' => ['Kesehatan', 'Kecantikan', 'Mandi Pagi', 'Wellness'],
                'is_featured' => false,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(3),
            ],

            // Lifestyle Category
            [
                'category' => 'Lifestyle',
                'title' => 'Rutinitas Self-Care untuk Wanita Modern yang Sibuk',
                'excerpt' => 'Sibuk bukan alasan untuk mengabaikan diri sendiri. Temukan rutinitas self-care praktis yang bisa dilakukan di tengah kesibukan.',
                'content' => "Di tengah kesibukan sebagai wanita modern, seringkali kita melupakan pentingnya merawat diri sendiri. Padahal, self-care adalah investasi untuk kesehatan fisik dan mental jangka panjang.

Rutinitas Pagi (15 menit)

1. Mandi Berkualitas
Gunakan body shampoo favorit Anda dan nikmati setiap momen. Jangan terburu-buru!

2. Skincare Simpel
Cleanse, tone, moisturize. Tiga langkah dasar yang tidak boleh dilewatkan.

3. Afirmasi Positif
Luangkan 2 menit untuk afirmasi positif di depan cermin.

Rutinitas Siang (10 menit)

1. Break yang Bermakna
Jangan skip lunch break. Gunakan untuk makan dengan tenang dan refresh pikiran.

2. Stretching Ringan
Lakukan peregangan selama 5 menit untuk mengurangi ketegangan otot.

Rutinitas Malam (20 menit)

1. Skincare Intensif
Waktu terbaik untuk perawatan kulit yang lebih mendalam.

2. Journaling
Tulis apa yang Anda syukuri hari ini dan rencana esok hari.

3. Relaksasi
Mandi malam dengan aroma lavender atau chamomile untuk tidur lebih nyenyak.

Tips Self-Care yang Mudah

- Selalu siapkan produk favorit yang membuat Anda senang
- Buat schedule dan patuhi sebisa mungkin
- Tidak perlu sempurna, konsistensi lebih penting
- Libatkan teman atau partner untuk saling support

Ingat, merawat diri sendiri bukan egois. Anda harus baik-baik saja dulu sebelum bisa memberikan yang terbaik untuk orang lain!",
                'reading_time' => '8 min read',
                'tags' => ['Self Care', 'Lifestyle', 'Wanita Modern', 'Wellness'],
                'is_featured' => false,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(4),
            ],

            // Tutorial Category
            [
                'category' => 'Tutorial',
                'title' => 'Panduan Lengkap Menggunakan Body Shampoo dengan Benar',
                'excerpt' => 'Cara penggunaan yang tepat akan memaksimalkan manfaat body shampoo. Pelajari teknik yang benar untuk hasil optimal.',
                'content' => "Menggunakan body shampoo mungkin terlihat sederhana, tetapi ada teknik yang tepat untuk mendapatkan hasil maksimal dan membuat produk lebih awet.

Persiapan Sebelum Mandi

1. Basahi Tubuh dengan Merata
Pastikan seluruh tubuh basah dengan air hangat untuk membuka pori-pori.

2. Siapkan Spons atau Washcloth
Alat bantu ini membantu menghasilkan busa lebih banyak dan membersihkan lebih efektif.

Langkah Penggunaan yang Benar

1. Ambil Secukupnya
Anda hanya perlu sedikit produk, sekitar satu sendok teh sudah cukup untuk seluruh tubuh.

2. Buat Busa Terlebih Dahulu
Tuang body shampoo ke spons atau tangan, tambahkan sedikit air, dan buat busa.

3. Aplikasikan dengan Lembut
Aplikasikan busa dengan gerakan memutar, mulai dari atas (leher) ke bawah (kaki).

4. Fokus pada Area Tertentu
Berikan perhatian ekstra pada area yang mudah berkeringat: ketiak, lipatan kulit, kaki.

5. Pijat dengan Lembut
Pijat kulit dengan lembut selama 1-2 menit untuk meningkatkan sirkulasi.

6. Bilas dengan Bersih
Pastikan tidak ada sisa busa yang tertinggal. Bilas dengan air mengalir dari atas ke bawah.

Tips Tambahan

- Gunakan air hangat saat aplikasi, air dingin saat bilasan akhir
- Jangan terlalu sering mandi dengan body shampoo (2x sehari cukup)
- Ganti spons atau washcloth secara berkala untuk menjaga kebersihan
- Keringkan tubuh dengan menepuk-nepuk, bukan menggosok
- Aplikasikan body lotion segera setelah mengeringkan tubuh

Kesalahan yang Harus Dihindari

- Menggunakan terlalu banyak produk
- Menggosok terlalu keras
- Menggunakan air terlalu panas
- Tidak membilas dengan bersih
- Tidak melembabkan setelah mandi

Dengan teknik yang tepat, kulit Anda akan terasa lebih bersih, lembut, dan sehat!",
                'reading_time' => '10 min read',
                'tags' => ['Tutorial', 'How To', 'Body Care', 'Panduan'],
                'is_featured' => false,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(6),
            ],

            // Company News Category
            [
                'category' => 'Company News',
                'title' => 'PT. Riau Food Lestari Raih Sertifikat Halal untuk Semua Produk',
                'excerpt' => 'Komitmen kami untuk memberikan produk berkualitas dan halal kini diperkuat dengan sertifikasi resmi dari MUI.',
                'content' => "PT. Riau Food Lestari dengan bangga mengumumkan bahwa seluruh rangkaian produk kami telah mendapatkan sertifikasi halal resmi dari Majelis Ulama Indonesia (MUI).

Tentang Sertifikasi

Proses sertifikasi halal ini melibatkan audit menyeluruh terhadap:
- Bahan baku yang digunakan
- Proses produksi
- Penyimpanan dan distribusi
- Kebersihan fasilitas produksi

Komitmen Kami

Sebagai perusahaan yang melayani mayoritas konsumen muslim di Indonesia, kami memahami pentingnya jaminan kehalalan produk. Sertifikasi ini adalah bukti komitmen kami untuk:

1. Transparansi Produk
Setiap konsumen berhak tahu apa yang mereka gunakan. Semua informasi bahan terang tertera di kemasan.

2. Kualitas Terjamin
Sertifikat halal juga menjamin bahwa produk dibuat dengan standar kebersihan dan kualitas tertinggi.

3. Kepercayaan Konsumen
Kami ingin konsumen merasa aman dan nyaman menggunakan produk kami.

Produk yang Tersertifikasi

Seluruh rangkaian produk Kusuka Body Shampoo dan produk lainnya telah mendapatkan sertifikasi halal. Logo halal MUI akan tercetak jelas pada setiap kemasan produk.

Masa Depan yang Lebih Baik

Ini adalah langkah awal dari komitmen kami untuk terus meningkatkan kualitas dan layanan. Kami juga sedang mengupayakan sertifikasi internasional untuk ekspansi pasar global.

Terima kasih atas kepercayaan Anda kepada PT. Riau Food Lestari!",
                'reading_time' => '5 min read',
                'tags' => ['Company News', 'Halal', 'Sertifikasi', 'Berita'],
                'is_featured' => false,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(7),
            ],

            // More posts...
            [
                'category' => 'Tips & Tricks',
                'title' => '5 Bahan Alami dalam Body Shampoo yang Bagus untuk Kulit',
                'excerpt' => 'Kenali bahan-bahan alami yang memberikan manfaat luar biasa untuk kesehatan kulit Anda.',
                'content' => "Bahan alami dalam body shampoo tidak hanya lebih aman, tetapi juga memberikan manfaat yang luar biasa untuk kulit. Berikut adalah 5 bahan alami yang paling efektif:

1. Aloe Vera
Manfaat: Melembabkan, menenangkan kulit iritasi, anti-inflamasi
Cocok untuk: Semua jenis kulit, terutama kulit sensitif

2. Coconut Oil
Manfaat: Deep moisturizing, antibakteri, membuat kulit lembut
Cocok untuk: Kulit kering dan normal

3. Tea Tree Oil
Manfaat: Antibakteri, anti-jamur, mengontrol minyak berlebih
Cocok untuk: Kulit berjerawat dan berminyak

4. Shea Butter
Manfaat: Melembabkan intensif, melembutkan kulit kasar
Cocok untuk: Kulit sangat kering

5. Vitamin E
Manfaat: Antioksidan, melindungi dari radikal bebas, anti-aging
Cocok untuk: Semua jenis kulit

Tips memilih produk dengan bahan alami:
- Baca label dengan teliti
- Pilih produk dengan bahan alami di urutan teratas
- Hindari produk dengan terlalu banyak bahan kimia
- Test patch sebelum penggunaan penuh
- Perhatikan tanggal kadaluarsa",
                'reading_time' => '6 min read',
                'tags' => ['Bahan Alami', 'Natural', 'Skincare', 'Tips'],
                'is_featured' => false,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(8),
            ],
        ];

        foreach ($posts as $postData) {
            $category = $categories->where('name', $postData['category'])->first();

            if (!$category) {
                continue;
            }

            BlogPost::create([
                'blog_category_id' => $category->id,
                'user_id' => $admin->id,
                'title' => $postData['title'],
                'slug' => Str::slug($postData['title']),
                'excerpt' => $postData['excerpt'],
                'content' => $postData['content'],
                'reading_time' => $postData['reading_time'],
                'tags' => $postData['tags'],
                'views_count' => rand(50, 500),
                'is_featured' => $postData['is_featured'],
                'is_published' => $postData['is_published'],
                'published_at' => $postData['published_at'],
            ]);
        }

        $this->command->info('Blog posts seeded successfully!');
    }
}