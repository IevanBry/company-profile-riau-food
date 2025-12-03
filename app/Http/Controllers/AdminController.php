<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Tampilkan halaman login admin
     */
    public function showLogin()
    {
        // Jika sudah login, redirect ke dashboard
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        return view('admin.login');
    }

    /**
     * Proses login admin
     */
    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Remember me
        $remember = $request->has('remember');

        // Coba login
        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            // Cek apakah user adalah admin
            if ($user->role !== 'admin') {
                Auth::logout();
                return redirect()->back()
                    ->with('error', 'Anda tidak memiliki akses ke area admin!')
                    ->withInput();
            }

            // Regenerate session untuk keamanan
            $request->session()->regenerate();

            return redirect('/admin/dashboard')
                ->with('success', 'Selamat datang, ' . $user->name . '!');
        }

        // Login gagal
        return redirect()->back()
            ->with('error', 'Email atau password salah!')
            ->withInput();
    }

    /**
     * Tampilkan dashboard admin (sementara)
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Logout admin
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login')
            ->with('success', 'Anda telah berhasil logout');
    }
}