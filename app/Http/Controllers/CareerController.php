<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class CareerController extends Controller
{
    /**
     * Display the career page with job listings
     */
    public function index()
    {
        // Return view tanpa passing data karena job listings sudah hardcoded di blade
        return view('careers.index');
    }

    /**
     * Get all available job listings
     */
    private function getJobListings()
    {
        return [
            [
                'id' => 1,
                'title' => 'Staff Gudang',
                'icon' => 'fa-truck',
                'type' => 'Full Time',
                'location' => 'Pekanbaru',
                'description' => 'Mengelola stok barang, melakukan penerimaan dan pengeluaran barang, serta memastikan sistem inventory berjalan dengan baik.',
                'skills' => ['Inventory Management', 'Logistik', 'Teliti'],
                'color' => 'orange',
                'requirements' => [
                    'Pendidikan minimal SMA/SMK',
                    'Pengalaman di bidang warehouse minimal 1 tahun',
                    'Mampu mengoperasikan komputer',
                    'Teliti dan bertanggung jawab',
                    'Dapat bekerja dalam tim'
                ]
            ],
            [
                'id' => 2,
                'title' => 'Sales Marketing',
                'icon' => 'fa-user-tie',
                'type' => 'Full Time',
                'location' => 'Pekanbaru',
                'description' => 'Bertanggung jawab dalam pengembangan pasar, mencari klien baru, dan membangun hubungan jangka panjang dengan pelanggan.',
                'skills' => ['Komunikasi', 'Negosiasi', 'Target Oriented'],
                'color' => 'blue',
                'requirements' => [
                    'Pendidikan minimal D3/S1 semua jurusan',
                    'Pengalaman di bidang sales minimal 1 tahun',
                    'Memiliki kendaraan pribadi dan SIM C',
                    'Mampu berkomunikasi dengan baik',
                    'Berorientasi pada target',
                    'Memiliki network yang luas'
                ]
            ],
            [
                'id' => 3,
                'title' => 'Staff Administrasi',
                'icon' => 'fa-calculator',
                'type' => 'Full Time',
                'location' => 'Pekanbaru',
                'description' => 'Menangani administrasi perusahaan, pengarsipan dokumen, entry data, dan mendukung operasional harian kantor.',
                'skills' => ['MS Office', 'Data Entry', 'Detail Oriented'],
                'color' => 'green',
                'requirements' => [
                    'Pendidikan minimal D3 semua jurusan',
                    'Menguasai MS Office (Excel, Word)',
                    'Teliti dan detail oriented',
                    'Mampu bekerja dengan deadline',
                    'Komunikatif dan rapih'
                ]
            ],
            [
                'id' => 4,
                'title' => 'Supir / Driver',
                'icon' => 'fa-shipping-fast',
                'type' => 'Full Time',
                'location' => 'Pekanbaru',
                'description' => 'Mengantar produk ke lokasi pelanggan dengan aman dan tepat waktu. Memiliki SIM B1 dan pengalaman mengemudi.',
                'skills' => ['SIM B1', 'Bertanggung Jawab', 'Jujur'],
                'color' => 'purple',
                'requirements' => [
                    'Pendidikan minimal SMA/SMK',
                    'Memiliki SIM B1 yang masih aktif',
                    'Pengalaman mengemudi minimal 2 tahun',
                    'Mengetahui rute di Pekanbaru dan sekitarnya',
                    'Jujur dan bertanggung jawab',
                    'Disiplin dan tepat waktu'
                ]
            ]
        ];
    }

    /**
     * Handle job application submission
     */
    public function apply(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'position' => 'required|string',
            'message' => 'nullable|string|max:1000',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120' // Max 5MB
        ]);

        try {
            // Store the CV file
            if ($request->hasFile('cv')) {
                $cv = $request->file('cv');
                $filename = time() . '_' . $validated['name'] . '_' . $cv->getClientOriginalName();
                $path = $cv->storeAs('applications', $filename, 'public');
                $validated['cv_path'] = $path;
            }

            // Here you can save to database if you have an Application model
            // Application::create($validated);

            // Send email notification to HR
            $this->sendApplicationNotification($validated);

            return redirect()->route('career')->with('success', 'Lamaran Anda berhasil dikirim! Tim HR kami akan segera menghubungi Anda.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim lamaran. Silakan coba lagi atau hubungi kami via WhatsApp.');
        }
    }

    /**
     * Send application notification email to HR
     */
    private function sendApplicationNotification($data)
    {
        // You can customize this email notification
        // For now, we'll just log it
        \Log::info('New job application received', [
            'name' => $data['name'],
            'email' => $data['email'],
            'position' => $data['position']
        ]);

        // Uncomment below if you want to send actual email
        /*
        Mail::send('emails.application', $data, function($message) use ($data) {
            $message->to('hr@riaufoodlestari.com')
                    ->subject('Lamaran Baru: ' . $data['position']);
        });
        */
    }

    /**
     * Show job detail
     */
    public function show($id)
    {
        $jobs = $this->getJobListings();
        $job = collect($jobs)->firstWhere('id', (int) $id);

        if (!$job) {
            abort(404);
        }

        return view('career.show', compact('job'));
    }
}