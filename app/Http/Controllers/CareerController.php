<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    /**
     * Display career page
     */
    public function index()
    {
        $jobs = Job::active()
            ->ordered()
            ->get();

        return view('careers.index', compact('jobs'));
    }

    /**
     * Submit job application
     */
    public function apply(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_id' => 'required|exists:jobs,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120', // max 5MB
        ], [
            'job_id.required' => 'Posisi harus dipilih',
            'job_id.exists' => 'Posisi tidak valid',
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'phone.required' => 'No. telepon harus diisi',
            'cv.required' => 'CV harus diupload',
            'cv.mimes' => 'CV harus berformat PDF, DOC, atau DOCX',
            'cv.max' => 'Ukuran CV maksimal 5MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Terjadi kesalahan pada form. Silakan periksa kembali.');
        }

        try {
            // Upload CV
            $cvPath = $request->file('cv')->store('cv', 'public');

            // Create application
            JobApplication::create([
                'job_id' => $request->job_id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
                'cv_file' => $cvPath,
                'status' => 'pending',
            ]);

            return redirect()->back()->with('success', 'Lamaran Anda berhasil dikirim! Tim kami akan menghubungi Anda segera.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat mengirim lamaran. Silakan coba lagi.');
        }
    }
}