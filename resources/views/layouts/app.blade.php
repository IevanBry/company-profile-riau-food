<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PT. Riau Food Lestari - Solusi Pangan Berkualitas')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: #4A7C2C;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-50">

    <!-- Navbar -->
    <nav class="bg-white shadow-lg fixed w-full top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-green-600 to-green-800 rounded-lg flex items-center justify-center">
                        <i class="fas fa-leaf text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">PT. Riau Food Lestari</h1>
                        <p class="text-xs text-gray-500">Solusi Pangan Berkualitas</p>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}"
                        class="nav-link text-gray-700 hover:text-green-700 font-medium transition">Beranda</a>

                    <a href="#about" class="nav-link text-gray-700 hover:text-green-700 font-medium transition">Tentang
                        Kami</a>

                    <a href="#services"
                        class="nav-link text-gray-700 hover:text-green-700 font-medium transition">Layanan</a>

                    <a href="#products"
                        class="nav-link text-gray-700 hover:text-green-700 font-medium transition">Produk</a>

                    <a href="#contact"
                        class="nav-link text-gray-700 hover:text-green-700 font-medium transition">Kontak</a>
                </div>

                <!-- CTA Button -->
                <div class="hidden md:block">
                    <a href="#contact"
                        class="bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition font-medium">
                        Hubungi Kami
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-gray-700">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4">
                <a href="{{ route('home') }}" class="block py-2 text-gray-700 hover:text-green-700">Beranda</a>
                <a href="#about" class="block py-2 text-gray-700 hover:text-green-700">Tentang Kami</a>
                <a href="#services" class="block py-2 text-gray-700 hover:text-green-700">Layanan</a>
                <a href="#products" class="block py-2 text-gray-700 hover:text-green-700">Produk</a>
                <a href="#contact" class="block py-2 text-gray-700 hover:text-green-700">Kontak</a>
            </div>
        </div>
    </nav>

    <div class="pt-20">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-green-600 to-green-800 rounded-lg flex items-center justify-center">
                            <i class="fas fa-leaf text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold">PT. Riau Food Lestari</h3>
                    </div>
                    <p class="text-gray-400 mb-4">Solusi pangan berkualitas untuk Indonesia yang lebih sehat dan
                        sejahtera.</p>
                </div>

                <div>
                    <h4 class="font-semibold mb-4 text-lg">Menu</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition">Beranda</a>
                        </li>
                        <li><a href="#about" class="text-gray-400 hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-white transition">Layanan</a></li>
                        <li><a href="#products" class="text-gray-400 hover:text-white transition">Produk</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition">Kontak</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold mb-4 text-lg">Kontak</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><i class="fas fa-map-marker-alt mr-2"></i> Jl. Raya Pekanbaru-Dumai KM 25, Riau</li>
                        <li><i class="fas fa-phone mr-2"></i> +62 761 234 567</li>
                        <li><i class="fas fa-envelope mr-2"></i> info@riaufoodlestari.com</li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold mb-4 text-lg">Newsletter</h4>
                    <p class="text-gray-400 mb-4">Dapatkan update produk terbaru kami</p>
                    <div class="flex gap-2">
                        <input type="email" placeholder="Email Anda"
                            class="flex-1 px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:outline-none focus:border-green-600 text-white">
                        <button class="bg-green-600 px-4 py-2 rounded-lg hover:bg-green-700 transition">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>

                    <div class="flex gap-4 mt-6">
                        <a href="#"
                            class="bg-gray-800 w-10 h-10 rounded-full flex items-center justify-center hover:bg-green-600 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="bg-gray-800 w-10 h-10 rounded-full flex items-center justify-center hover:bg-green-600 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="bg-gray-800 w-10 h-10 rounded-full flex items-center justify-center hover:bg-green-600 transition">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#"
                            class="bg-gray-800 w-10 h-10 rounded-full flex items-center justify-center hover:bg-green-600 transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 text-center">
                <p class="text-gray-400">&copy; 2024 PT. Riau Food Lestari. All rights reserved.</p>
            </div>
        </div>
    </footer>

    @livewireScripts

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    // Close mobile menu if open
                    document.getElementById('mobile-menu').classList.add('hidden');
                }
            });
        });

        // Navbar scroll effect
        let lastScroll = 0;
        const navbar = document.querySelector('nav');

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;

            if (currentScroll > 100) {
                navbar.classList.add('shadow-2xl');
            } else {
                navbar.classList.remove('shadow-2xl');
            }

            lastScroll = currentScroll;
        });
    </script>

    @stack('scripts')
</body>

</html>