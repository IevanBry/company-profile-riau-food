<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PT. Riau Food Lestari - Importir & Distributor Terpercaya')</title>

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
            background: linear-gradient(135deg, #F97316 0%, #DC2626 100%);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link.active::after {
            width: 100%;
        }

        .navbar-gradient {
            background: linear-gradient(to right, #ffffff 0%, #fff5f0 100%);
        }

        .logo-glow {
            filter: drop-shadow(0 0 10px rgba(249, 115, 22, 0.3));
            transition: all 0.3s ease;
        }

        .logo-glow:hover {
            filter: drop-shadow(0 0 15px rgba(249, 115, 22, 0.5));
            transform: scale(1.05);
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-50">

    <!-- Navbar -->
    <nav class="navbar-gradient shadow-lg fixed w-full top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-3">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <img src="{{ asset('images/logo.png') }}" alt="PT. Riau Food Lestari Logo"
                        class="h-14 w-auto logo-glow">
                    <div>
                        <h1
                            class="text-xl font-bold bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text text-transparent">
                            PT. Riau Food Lestari
                        </h1>
                        <p class="text-xs text-gray-600 font-medium">Importir & Distributor Terpercaya</p>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}"
                        class="nav-link {{ request()->routeIs('home') ? 'active text-orange-600' : 'text-gray-700' }} hover:text-orange-600 font-medium transition">
                        <i class="fas fa-home mr-1"></i> Beranda
                    </a>

                    <a href="{{ route('products') }}"
                        class="nav-link {{ request()->routeIs('products') ? 'active text-orange-600' : 'text-gray-700' }} hover:text-orange-600 font-medium transition">
                        <i class="fas fa-box-open mr-1"></i> Produk
                    </a>

                    <a href="{{ route('blog') }}"
                        class="nav-link {{ request()->routeIs('blog') ? 'active text-orange-600' : 'text-gray-700' }} hover:text-orange-600 font-medium transition">
                        <i class="fas fa-newspaper mr-1"></i> Blog & Artikel
                    </a>

                    <a href="{{ route('company') }}"
                        class="nav-link {{ request()->routeIs('company') ? 'active text-orange-600' : 'text-gray-700' }} hover:text-orange-600 font-medium transition">
                        <i class="fas fa-building mr-1"></i> Perusahaan
                    </a>

                    <a href="{{ route('career') }}"
                        class="nav-link {{ request()->routeIs('career') ? 'active text-orange-600' : 'text-gray-700' }} hover:text-orange-600 font-medium transition">
                        <i class="fas fa-briefcase mr-1"></i> Karir
                    </a>
                </div>

                <!-- CTA Button -->
                <div class="hidden md:flex items-center space-x-3">
                    <a href="https://wa.me/6282390017777" target="_blank"
                        class="bg-gradient-to-r from-green-500 to-green-600 text-white px-5 py-2.5 rounded-full hover:from-green-600 hover:to-green-700 transition font-medium shadow-lg hover:shadow-xl flex items-center space-x-2">
                        <i class="fab fa-whatsapp"></i>
                        <span>WhatsApp</span>
                    </a>
                    <a href="{{ route('home') }}#contact"
                        class="bg-gradient-to-r from-orange-500 to-red-600 text-white px-5 py-2.5 rounded-full hover:from-orange-600 hover:to-red-700 transition font-medium shadow-lg hover:shadow-xl">
                        Hubungi Kami
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-gray-700 hover:text-orange-600 transition">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4 border-t border-orange-100 mt-2 pt-4">
                <a href="{{ route('home') }}"
                    class="block py-2.5 px-4 rounded-lg {{ request()->routeIs('home') ? 'bg-orange-50 text-orange-600 font-semibold' : 'text-gray-700' }} hover:bg-orange-50 hover:text-orange-600 transition">
                    <i class="fas fa-home mr-2"></i> Beranda
                </a>
                <a href="{{ route('home') }}#about"
                    class="block py-2.5 px-4 rounded-lg text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition">
                    <i class="fas fa-info-circle mr-2"></i> Tentang Kami
                </a>
                <a href="{{ route('home') }}#services"
                    class="block py-2.5 px-4 rounded-lg text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition">
                    <i class="fas fa-cogs mr-2"></i> Layanan
                </a>
                <a href="{{ route('products') }}"
                    class="block py-2.5 px-4 rounded-lg {{ request()->routeIs('products') ? 'bg-orange-50 text-orange-600 font-semibold' : 'text-gray-700' }} hover:bg-orange-50 hover:text-orange-600 transition">
                    <i class="fas fa-box-open mr-2"></i> Produk
                </a>
                <a href="{{ route('home') }}#contact"
                    class="block py-2.5 px-4 rounded-lg text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition">
                    <i class="fas fa-envelope mr-2"></i> Kontak
                </a>

                <!-- Mobile CTA Buttons -->
                <div class="mt-4 space-y-2 px-4">
                    <a href="https://wa.me/6282390017777" target="_blank"
                        class="block text-center bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-3 rounded-lg hover:from-green-600 hover:to-green-700 transition font-medium shadow-lg">
                        <i class="fab fa-whatsapp mr-2"></i> Chat WhatsApp
                    </a>
                    <a href="{{ route('home') }}#contact"
                        class="block text-center bg-gradient-to-r from-orange-500 to-red-600 text-white px-4 py-3 rounded-lg hover:from-orange-600 hover:to-red-700 transition font-medium shadow-lg">
                        <i class="fas fa-phone mr-2"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="pt-20">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-gradient-to-b from-gray-900 to-black text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <!-- Company Info -->
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="{{ asset('images/logo.png') }}" alt="PT. Riau Food Lestari" class="h-12 w-auto">
                        <h3 class="text-xl font-bold">PT. Riau Food Lestari</h3>
                    </div>
                    <p class="text-gray-400 mb-4">Importir dan distributor produk berkualitas tinggi untuk kebutuhan
                        Anda di seluruh Indonesia.</p>
                    <div class="flex items-center space-x-2 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span class="text-gray-400 text-sm ml-2">Distributor Terpercaya</span>
                    </div>
                </div>

                <!-- Menu Navigation -->
                <div>
                    <h4 class="font-semibold mb-4 text-lg flex items-center">
                        <i class="fas fa-bars text-orange-500 mr-2"></i> Menu
                    </h4>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('home') }}"
                                class="text-gray-400 hover:text-orange-500 transition flex items-center group">
                                <i
                                    class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 transition-transform"></i>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('products') }}"
                                class="text-gray-400 hover:text-orange-500 transition flex items-center group">
                                <i
                                    class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 transition-transform"></i>
                                Produk
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('blog') }}"
                                class="text-gray-400 hover:text-orange-500 transition flex items-center group">
                                <i
                                    class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 transition-transform"></i>
                                Blog & Artikel
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('company') }}"
                                class="text-gray-400 hover:text-orange-500 transition flex items-center group">
                                <i
                                    class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 transition-transform"></i>
                                Perusahaan
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('career') }}"
                                class="text-gray-400 hover:text-orange-500 transition flex items-center group">
                                <i
                                    class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 transition-transform"></i>
                                Karir
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Information -->
                <div>
                    <h4 class="font-semibold mb-4 text-lg flex items-center">
                        <i class="fas fa-phone text-orange-500 mr-2"></i> Kontak
                    </h4>
                    <ul class="space-y-3 text-gray-400">
                        <li class="flex items-start group">
                            <i
                                class="fas fa-map-marker-alt text-orange-500 mr-3 mt-1 group-hover:scale-110 transition-transform"></i>
                            <span>Jl. Soekarno Hatta, Gang Nusa Indah<br>Pekanbaru, Riau 28111<br>Indonesia</span>
                        </li>
                        <li class="flex items-center group">
                            <i class="fas fa-phone text-orange-500 mr-3 group-hover:scale-110 transition-transform"></i>
                            <a href="tel:+6282390017777" class="hover:text-orange-500 transition">+62 823-9001-7777</a>
                        </li>
                        <li class="flex items-center group">
                            <i
                                class="fas fa-envelope text-orange-500 mr-3 group-hover:scale-110 transition-transform"></i>
                            <a href="mailto:info@riaufoodlestari.com"
                                class="hover:text-orange-500 transition">info@riaufoodlestari.com</a>
                        </li>
                        <li class="flex items-start group">
                            <i
                                class="fas fa-clock text-orange-500 mr-3 mt-1 group-hover:scale-110 transition-transform"></i>
                            <div>
                                <div class="font-semibold text-white">Senin - Sabtu</div>
                                <div class="text-sm">08:30 - 17:00 WIB</div>
                                <div class="text-sm mt-1 text-red-400">Minggu: Tutup</div>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div>
                    <h4 class="font-semibold mb-4 text-lg flex items-center">
                        <i class="fas fa-share-alt text-orange-500 mr-2"></i> Ikuti Kami
                    </h4>
                    <p class="text-gray-400 mb-4">Dapatkan update produk terbaru dan promo menarik</p>

                    <div class="flex gap-3 mb-6">
                        <a href="https://wa.me/6282390017777" target="_blank"
                            class="bg-gradient-to-br from-green-500 to-green-600 w-10 h-10 rounded-full flex items-center justify-center hover:scale-110 transition-transform shadow-lg hover:shadow-green-500/50">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://instagram.com/riaufoodlestari" target="_blank"
                            class="bg-gradient-to-br from-pink-500 to-purple-600 w-10 h-10 rounded-full flex items-center justify-center hover:scale-110 transition-transform shadow-lg hover:shadow-pink-500/50">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="bg-gradient-to-br from-blue-500 to-blue-600 w-10 h-10 rounded-full flex items-center justify-center hover:scale-110 transition-transform shadow-lg hover:shadow-blue-500/50">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="bg-gradient-to-br from-blue-400 to-blue-500 w-10 h-10 rounded-full flex items-center justify-center hover:scale-110 transition-transform shadow-lg hover:shadow-blue-400/50">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-gray-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-gray-400 text-sm text-center md:text-left">
                        &copy; {{ date('Y') }} PT. Riau Food Lestari. All rights reserved.
                    </p>

                    <div class="flex flex-wrap justify-center items-center gap-4 text-sm text-gray-400">
                        <a href="#" class="hover:text-orange-500 transition">Privacy Policy</a>
                        <span>|</span>
                        <a href="#" class="hover:text-orange-500 transition">Terms of Service</a>
                        <span>|</span>
                        <a href="{{ route('career') }}" class="hover:text-orange-500 transition">Karir</a>
                        <span>|</span>
                        <a href="{{ route('company') }}" class="hover:text-orange-500 transition">Tentang Kami</a>
                    </div>

                    <div class="flex items-center space-x-2">
                        <i class="fas fa-heart text-red-500 animate-pulse"></i>
                        <span class="text-gray-400 text-sm">Made with love in Pekanbaru</span>
                    </div>
                </div>
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
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');

            // Animate icon
            const icon = this.querySelector('i');
            if (mobileMenu.classList.contains('hidden')) {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            } else {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            }
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function (event) {
            const isClickInsideMenu = mobileMenu.contains(event.target);
            const isClickOnButton = mobileMenuButton.contains(event.target);

            if (!isClickInsideMenu && !isClickOnButton && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                const icon = mobileMenuButton.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Smooth scroll untuk anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');

                if (href === '#') {
                    e.preventDefault();
                    return;
                }

                e.preventDefault();
                const target = document.querySelector(href);

                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    // Close mobile menu if open
                    mobileMenu.classList.add('hidden');
                    const icon = mobileMenuButton.querySelector('i');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });
        });

        // Handle links with route + anchor
        document.querySelectorAll('a[href*="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');

                if (href.includes('/#') || (href.startsWith('/') && href.includes('#'))) {
                    const [route, hash] = href.split('#');
                    const currentPath = window.location.pathname;

                    if (currentPath === route || (route === '' && currentPath === '/')) {
                        e.preventDefault();
                        const target = document.getElementById(hash);
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                            mobileMenu.classList.add('hidden');
                            const icon = mobileMenuButton.querySelector('i');
                            icon.classList.remove('fa-times');
                            icon.classList.add('fa-bars');
                        }
                    }
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
                navbar.style.background = 'linear-gradient(to right, #ffffff 0%, #fff5f0 100%)';
            } else {
                navbar.classList.remove('shadow-2xl');
            }

            lastScroll = currentScroll;
        });
    </script>

    @stack('scripts')
</body>

</html>