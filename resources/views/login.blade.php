@extends('layouts.app')

@section('title', 'Admin Login - PT. Riau Food Lestari')

@section('content')

    <!-- Login Section -->
    <section class="min-h-screen flex items-center justify-center py-12 px-4 relative overflow-hidden">
        <!-- Background Gradient -->
        <div class="absolute inset-0 hero-gradient opacity-5"></div>
        <div class="absolute inset-0">
            <div class="absolute top-20 left-20 w-96 h-96 bg-green-200 rounded-full blur-3xl opacity-20"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-blue-200 rounded-full blur-3xl opacity-20"></div>
        </div>

        <div class="container mx-auto relative z-10">
            <div class="max-w-md mx-auto">
                <!-- Login Card -->
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden" data-aos="zoom-in">
                    <!-- Header -->
                    <div class="hero-gradient text-white p-8 text-center">
                        <div
                            class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user-shield text-4xl"></i>
                        </div>
                        <h2 class="text-3xl font-bold mb-2">Admin Login</h2>
                        <p class="text-gray-100">PT. Riau Food Lestari</p>
                    </div>

                    <!-- Login Form -->
                    <div class="p-8">
                        <!-- Alert untuk error (hidden by default) -->
                        <div id="error-alert"
                            class="hidden mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl flex items-start">
                            <i class="fas fa-exclamation-circle mt-0.5 mr-3"></i>
                            <span id="error-message">Email atau password salah!</span>
                        </div>

                        <form action="/admin/login" method="POST" id="loginForm">
                            @csrf

                            <!-- Email Field -->
                            <div class="mb-6">
                                <label for="email" class="block text-gray-700 font-semibold mb-2">
                                    <i class="fas fa-envelope mr-2 text-green-600"></i> Email
                                </label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition"
                                    placeholder="admin@riaufoodlestari.com">
                            </div>

                            <!-- Password Field -->
                            <div class="mb-6">
                                <label for="password" class="block text-gray-700 font-semibold mb-2">
                                    <i class="fas fa-lock mr-2 text-green-600"></i> Password
                                </label>
                                <div class="relative">
                                    <input type="password" id="password" name="password" required
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition pr-12"
                                        placeholder="••••••••">
                                    <button type="button" id="togglePassword"
                                        class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition">
                                        <i class="fas fa-eye" id="eyeIcon"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="flex items-center justify-between mb-6">
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" name="remember"
                                        class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                                    <span class="ml-2 text-sm text-gray-600">Ingat Saya</span>
                                </label>
                                <a href="/admin/forgot-password"
                                    class="text-sm text-green-600 hover:text-green-700 font-semibold">
                                    Lupa Password?
                                </a>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-green-600 to-green-700 text-white py-4 rounded-xl font-semibold hover:from-green-700 hover:to-green-800 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                <i class="fas fa-sign-in-alt mr-2"></i> Masuk Dashboard
                            </button>
                        </form>

                        <!-- Divider -->
                        <div class="relative my-8">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-200"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-gray-500">Atau</span>
                            </div>
                        </div>

                        <!-- Back to Home -->
                        <a href="/"
                            class="block w-full text-center border-2 border-gray-200 text-gray-700 py-4 rounded-xl font-semibold hover:border-green-500 hover:text-green-600 transition">
                            <i class="fas fa-home mr-2"></i> Kembali ke Beranda
                        </a>
                    </div>

                    <!-- Footer Info -->
                    <div class="bg-gray-50 px-8 py-6 text-center border-t border-gray-100">
                        <p class="text-sm text-gray-600">
                            <i class="fas fa-shield-alt mr-1 text-green-600"></i>
                            Area khusus administrator
                        </p>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Butuh bantuan?
                        <a href="#contact" class="text-green-600 hover:text-green-700 font-semibold">
                            Hubungi Support
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #2D5016 0%, #4A7C2C 50%, #6B9D3E 100%);
        }

        /* Input focus animation */
        input:focus {
            transform: translateY(-2px);
        }

        /* Password toggle animation */
        #togglePassword:active {
            transform: translateY(-50%) scale(0.95);
        }

        /* Button press animation */
        button[type="submit"]:active {
            transform: translateY(0) !important;
        }
    </style>
@endpush

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

        // Form Validation & Error Handling
        document.getElementById('loginForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Basic validation
            if (!email || !password) {
                showError('Mohon isi semua field!');
                return;
            }

            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showError('Format email tidak valid!');
                return;
            }

            // Here you would normally submit to your backend
            // For now, just simulate the submission
            console.log('Form submitted:', { email, password });

            // Uncomment this line when you have backend ready:
            // this.submit();
        });

        // Show error message
        function showError(message) {
            const errorAlert = document.getElementById('error-alert');
            const errorMessage = document.getElementById('error-message');

            errorMessage.textContent = message;
            errorAlert.classList.remove('hidden');

            // Auto hide after 5 seconds
            setTimeout(() => {
                errorAlert.classList.add('hidden');
            }, 5000);
        }

        // Check for Laravel error messages
        @if($errors->any())
            showError('{{ $errors->first() }}');
        @endif

        @if(session('error'))
            showError('{{ session('error') }}');
        @endif
    </script>
@endpush