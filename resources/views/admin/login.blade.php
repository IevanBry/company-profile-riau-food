@extends('layouts.app')

@section('title', 'Admin Login - PT. Riau Food Lestari')

@section('content')

    <!-- Login Section -->
    <section class="min-h-screen flex items-center justify-center py-12 px-4 bg-gray-50">
        <div class="container mx-auto">
            <div class="max-w-md mx-auto">
                <!-- Login Card -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <!-- Header -->
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white p-8 text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-user-shield text-3xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold mb-1">Admin Login</h2>
                        <p class="text-orange-50 text-sm">PT. Riau Food Lestari</p>
                    </div>

                    <!-- Login Form -->
                    <div class="p-8">
                        <!-- Alert untuk error -->
                        @if($errors->any())
                            <div
                                class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg flex items-start text-sm">
                                <i class="fas fa-exclamation-circle mt-0.5 mr-2"></i>
                                <span>{{ $errors->first() }}</span>
                            </div>
                        @endif

                        @if(session('error'))
                            <div
                                class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg flex items-start text-sm">
                                <i class="fas fa-exclamation-circle mt-0.5 mr-2"></i>
                                <span>{{ session('error') }}</span>
                            </div>
                        @endif

                        @if(session('success'))
                            <div
                                class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-start text-sm">
                                <i class="fas fa-check-circle mt-0.5 mr-2"></i>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        <form action="{{ route('admin.login') }}" method="POST" id="loginForm">
                            @csrf

                            <!-- Email Field -->
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 font-medium mb-2 text-sm">
                                    <i class="fas fa-envelope mr-1 text-orange-500"></i> Email
                                </label>
                                <input type="email" id="email" name="email" required value="{{ old('email') }}"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:border-orange-500 focus:ring-1 focus:ring-orange-500 focus:outline-none transition"
                                    placeholder="admin@riaufoodlestari.com">
                            </div>

                            <!-- Password Field -->
                            <div class="mb-4">
                                <label for="password" class="block text-gray-700 font-medium mb-2 text-sm">
                                    <i class="fas fa-lock mr-1 text-orange-500"></i> Password
                                </label>
                                <div class="relative">
                                    <input type="password" id="password" name="password" required
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:border-orange-500 focus:ring-1 focus:ring-orange-500 focus:outline-none transition pr-11"
                                        placeholder="••••••••">
                                    <button type="button" id="togglePassword"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition">
                                        <i class="fas fa-eye text-sm" id="eyeIcon"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="flex items-center justify-between mb-6">
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" name="remember"
                                        class="w-4 h-4 text-orange-500 border-gray-300 rounded focus:ring-orange-500">
                                    <span class="ml-2 text-sm text-gray-600">Ingat Saya</span>
                                </label>
                                <a href="#" class="text-sm text-orange-500 hover:text-orange-600 font-medium">
                                    Lupa Password?
                                </a>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" id="submitBtn"
                                class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-lg font-medium transition shadow-sm hover:shadow">
                                <i class="fas fa-sign-in-alt mr-2"></i> <span id="btnText">Masuk Dashboard</span>
                            </button>
                        </form>

                        <!-- Divider -->
                        <div class="relative my-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-200"></div>
                            </div>
                            <div class="relative flex justify-center text-xs">
                                <span class="px-3 bg-white text-gray-500">Atau</span>
                            </div>
                        </div>

                        <!-- Back to Home -->
                        <a href="{{ route('home') }}"
                            class="block w-full text-center border border-gray-300 text-gray-700 py-3 rounded-lg font-medium hover:border-orange-500 hover:text-orange-500 transition">
                            <i class="fas fa-home mr-2"></i> Kembali ke Beranda
                        </a>
                    </div>

                    <!-- Footer Info -->
                    <div class="bg-gray-50 px-8 py-4 text-center border-t border-gray-100">
                        <p class="text-xs text-gray-600">
                            <i class="fas fa-shield-alt mr-1 text-orange-500"></i>
                            Area khusus administrator
                        </p>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-600">
                        Butuh bantuan?
                        <a href="#contact" class="text-orange-500 hover:text-orange-600 font-medium">
                            Hubungi Support
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        // Toggle Password Visibility
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });

        // Form Submit Handler
        const loginForm = document.getElementById('loginForm');
        const submitBtn = document.getElementById('submitBtn');
        const btnText = document.getElementById('btnText');

        loginForm.addEventListener('submit', function (e) {
            // Disable button to prevent double submit
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
            btnText.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Memproses...';
        });
    </script>
@endpush