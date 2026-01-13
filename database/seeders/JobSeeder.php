<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
use Illuminate\Support\Str;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $jobs = [
            [
                'title' => 'Staff Gudang',
                'location' => 'Pekanbaru',
                'type' => 'full_time',
                'description' => 'Mengelola stok barang, melakukan penerimaan dan pengeluaran barang, serta memastikan sistem inventory berjalan dengan baik. Bertanggung jawab untuk menjaga kerapihan dan keamanan gudang.',
                'requirements' => "- Minimal pendidikan SMA/SMK
- Pengalaman di bidang warehouse minimal 1 tahun (lebih disukai)
- Teliti dan detail oriented
- Mampu mengangkat beban berat
- Jujur dan bertanggung jawab
- Dapat bekerja dalam tim
- Bersedia bekerja dengan sistem shift",
                'responsibilities' => "- Melakukan stock opname secara berkala
- Menerima dan memeriksa barang masuk
- Mengatur penyimpanan barang dengan sistem FIFO
- Melakukan pengecekan kualitas barang
- Membuat laporan harian gudang
- Memastikan kebersihan dan kerapihan gudang
- Koordinasi dengan tim logistik dan delivery",
                'skills' => ['Inventory Management', 'Stock Opname', 'Teliti', 'Fisik Kuat', 'MS Excel'],
                'salary_range' => 'Rp 3.500.000 - Rp 4.500.000',
                'icon' => 'fas fa-warehouse',
                'color' => '#F97316',
                'order' => 1,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Sales Marketing',
                'location' => 'Pekanbaru',
                'type' => 'full_time',
                'description' => 'Bertanggung jawab dalam pengembangan pasar, mencari klien baru, dan membangun hubungan jangka panjang dengan pelanggan. Posisi ini membutuhkan kemampuan komunikasi yang baik dan orientasi pada target.',
                'requirements' => "- Minimal D3/S1 dari semua jurusan
- Pengalaman di bidang sales/marketing minimal 1-2 tahun
- Memiliki kendaraan pribadi (SIM C)
- Mampu berkomunikasi dengan baik
- Target oriented dan persuasif
- Memiliki networking yang luas
- Penampilan menarik dan rapi
- Bersedia melakukan perjalanan dinas",
                'responsibilities' => "- Mencari dan mengembangkan pasar baru
- Melakukan kunjungan ke klien potensial
- Membuat proposal penawaran
- Melakukan presentasi produk ke klien
- Negosiasi harga dan kontrak
- Mencapai target penjualan bulanan
- Membuat laporan penjualan
- Maintain hubungan baik dengan existing customer",
                'skills' => ['Komunikasi', 'Negosiasi', 'Presentasi', 'Target Oriented', 'MS Office', 'Networking'],
                'salary_range' => 'Rp 4.000.000 - Rp 7.000.000 + Komisi',
                'icon' => 'fas fa-user-tie',
                'color' => '#3B82F6',
                'order' => 2,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Staff Administrasi',
                'location' => 'Pekanbaru',
                'type' => 'full_time',
                'description' => 'Menangani administrasi perusahaan, pengarsipan dokumen, entry data, dan mendukung operasional harian kantor. Membutuhkan ketelitian tinggi dan kemampuan multitasking.',
                'requirements' => "- Minimal D3 dari semua jurusan
- Pengalaman di bidang administrasi minimal 1 tahun
- Menguasai MS Office (Word, Excel, PowerPoint)
- Teliti dan detail oriented
- Mampu bekerja dengan deadline
- Komunikatif dan kooperatif
- Rapi dalam penyimpanan dokumen",
                'responsibilities' => "- Melakukan input dan update data perusahaan
- Mengarsipkan dokumen dengan rapi
- Membuat dan mengirim surat-menyurat
- Menerima telepon dan tamu
- Membuat laporan administrasi
- Membantu koordinasi antar divisi
- Mengelola inventaris kantor
- Mendukung operasional harian kantor",
                'skills' => ['MS Office', 'Data Entry', 'Filing', 'Detail Oriented', 'Komunikasi', 'Multitasking'],
                'salary_range' => 'Rp 3.500.000 - Rp 5.000.000',
                'icon' => 'fas fa-calculator',
                'color' => '#10B981',
                'order' => 3,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Supir / Driver',
                'location' => 'Pekanbaru',
                'type' => 'full_time',
                'description' => 'Mengantar produk ke lokasi pelanggan dengan aman dan tepat waktu. Memiliki SIM B1 dan pengalaman mengemudi kendaraan box/engkel. Harus jujur, bertanggung jawab, dan mengenal rute Pekanbaru dengan baik.',
                'requirements' => "- Minimal pendidikan SMA/SMK
- Memiliki SIM B1 yang masih berlaku
- Pengalaman mengemudi mobil box/engkel minimal 2 tahun
- Mengenal rute Pekanbaru dan sekitarnya
- Sehat jasmani dan rohani
- Jujur dan bertanggung jawab
- Disiplin dan tepat waktu
- Tidak memiliki catatan pelanggaran lalu lintas yang serius",
                'responsibilities' => "- Mengantar barang ke customer sesuai jadwal
- Memastikan barang sampai dengan aman
- Menjaga kebersihan dan kondisi kendaraan
- Melakukan pengecekan kendaraan sebelum dan sesudah perjalanan
- Membuat laporan pengiriman harian
- Koordinasi dengan tim gudang dan admin
- Mengurus dokumen pengiriman (surat jalan, invoice)",
                'skills' => ['SIM B1', 'Mengemudi', 'Mengenal Rute', 'Jujur', 'Bertanggung Jawab', 'Disiplin'],
                'salary_range' => 'Rp 3.800.000 - Rp 4.800.000 + Uang Jalan',
                'icon' => 'fas fa-truck',
                'color' => '#8B5CF6',
                'order' => 4,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Staff Accounting',
                'location' => 'Pekanbaru',
                'type' => 'full_time',
                'description' => 'Bertanggung jawab dalam mengelola pembukuan perusahaan, membuat laporan keuangan, dan memastikan semua transaksi tercatat dengan baik sesuai standar akuntansi.',
                'requirements' => "- Minimal D3/S1 Akuntansi
- Pengalaman di bidang accounting minimal 2 tahun
- Menguasai software akuntansi (Accurate, Zahir, atau sejenisnya)
- Memahami perpajakan (PPh 21, 23, PPN)
- Teliti dan detail oriented
- Mampu bekerja dengan deadline
- Jujur dan dapat dipercaya",
                'responsibilities' => "- Melakukan pencatatan transaksi keuangan harian
- Membuat laporan keuangan bulanan
- Melakukan rekonsiliasi bank
- Menghitung dan melaporkan pajak perusahaan
- Membuat cash flow perusahaan
- Koordinasi dengan auditor internal/eksternal
- Arsip dokumen keuangan dengan rapi",
                'skills' => ['Accounting', 'Pembukuan', 'Software Akuntansi', 'Perpajakan', 'MS Excel', 'Teliti'],
                'salary_range' => 'Rp 4.500.000 - Rp 6.500.000',
                'icon' => 'fas fa-calculator',
                'color' => '#EC4899',
                'order' => 5,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Supervisor Logistik',
                'location' => 'Pekanbaru',
                'type' => 'full_time',
                'description' => 'Mengawasi dan mengkoordinir kegiatan logistik perusahaan termasuk penerimaan, penyimpanan, dan pengiriman barang. Memastikan proses logistik berjalan efisien dan tepat waktu.',
                'requirements' => "- Minimal D3/S1 dari semua jurusan
- Pengalaman di bidang logistik/supply chain minimal 3 tahun
- Memiliki pengalaman sebagai supervisor minimal 1 tahun
- Menguasai sistem inventory dan warehouse management
- Leadership dan problem solving yang baik
- Mampu bekerja dengan target
- Bersedia bekerja dengan sistem shift",
                'responsibilities' => "- Mengawasi operasional gudang dan delivery
- Membuat scheduling pengiriman
- Monitoring stock dan inventory
- Koordinasi dengan tim sales dan purchasing
- Membuat SOP logistik
- Training dan evaluasi staff gudang
- Membuat laporan logistik bulanan
- Handle komplain terkait pengiriman",
                'skills' => ['Leadership', 'Logistic Management', 'Inventory Control', 'Problem Solving', 'Koordinasi', 'Analytical'],
                'salary_range' => 'Rp 5.500.000 - Rp 7.500.000',
                'icon' => 'fas fa-dolly',
                'color' => '#6366F1',
                'order' => 6,
                'is_active' => false,
                'is_featured' => false,
            ],
        ];

        foreach ($jobs as $jobData) {
            Job::create([
                'title' => $jobData['title'],
                'slug' => Str::slug($jobData['title']),
                'location' => $jobData['location'],
                'type' => $jobData['type'],
                'description' => $jobData['description'],
                'requirements' => $jobData['requirements'],
                'responsibilities' => $jobData['responsibilities'],
                'skills' => $jobData['skills'],
                'salary_range' => $jobData['salary_range'],
                'icon' => $jobData['icon'],
                'color' => $jobData['color'],
                'order' => $jobData['order'],
                'is_active' => $jobData['is_active'],
                'is_featured' => $jobData['is_featured'],
            ]);
        }

        $this->command->info('✅ Jobs seeded successfully! Total: ' . count($jobs) . ' jobs');
    }
}