<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - PT. Riau Food Lestari</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @stack('styles')
</head>

<body class="bg-gray-50">

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gradient-to-b from-orange-500 to-orange-600">
            <!-- Logo -->
            <div class="flex items-center justify-center mb-6 p-4 bg-white rounded-lg">
                <div class="text-center w-full">
                    <!-- Ganti dengan path logo Anda -->
                    <img src="{{ asset('images/logo.png') }}" 
                         alt="PT. Riau Food Lestari" 
                         class="h-16 w-auto mx-auto mb-2 object-contain">
                    <h2 class="text-lg font-bold text-orange-600">PT. Riau Food Lestari</h2>
                    <p class="text-xs text-gray-600">Admin Panel</p>
                </div>
            </div>

            <!-- Menu -->
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center p-3 text-white rounded-lg hover:bg-white/20 transition {{ request()->routeIs('admin.dashboard') ? 'bg-white/20' : '' }}">
                        <i class="fas fa-home w-5"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.home.edit') }}"
                        class="flex items-center p-3 text-white rounded-lg hover:bg-white/20 transition {{ request()->routeIs('admin.home.*') ? 'bg-white/20' : '' }}">
                        <i class="fas fa-edit w-5"></i>
                        <span class="ml-3">Edit Home</span>
                    </a>
                </li>

                <!-- Product Menu -->
                <li>
                    <button onclick="toggleProductMenu()"
                        class="flex items-center justify-between w-full p-3 text-white rounded-lg hover:bg-white/20 transition {{ request()->routeIs('admin.products.*') ? 'bg-white/20' : '' }}">
                        <div class="flex items-center">
                            <i class="fas fa-box w-5"></i>
                            <span class="ml-3">Produk</span>
                        </div>
                        <i class="fas fa-chevron-down text-sm" id="productMenuIcon"></i>
                    </button>
                    <ul id="productMenu" class="hidden ml-6 mt-2 space-y-2">
                        <li>
                            <a href="{{ route('admin.products.categories') }}"
                                class="flex items-center p-2 text-white rounded-lg hover:bg-white/20 transition text-sm {{ request()->routeIs('admin.products.categories*') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-tags w-4 text-xs"></i>
                                <span class="ml-2">Kategori</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.products.index') }}"
                                class="flex items-center p-2 text-white rounded-lg hover:bg-white/20 transition text-sm {{ request()->routeIs('admin.products.index') || request()->routeIs('admin.products.create') || request()->routeIs('admin.products.edit') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-list w-4 text-xs"></i>
                                <span class="ml-2">Semua Produk</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Blog Menu -->
                <li>
                    <button onclick="toggleBlogMenu()"
                        class="flex items-center justify-between w-full p-3 text-white rounded-lg hover:bg-white/20 transition {{ request()->routeIs('admin.blog.*') ? 'bg-white/20' : '' }}">
                        <div class="flex items-center">
                            <i class="fas fa-blog w-5"></i>
                            <span class="ml-3">Blog & Artikel</span>
                        </div>
                        <i class="fas fa-chevron-down text-sm" id="blogMenuIcon"></i>
                    </button>
                    <ul id="blogMenu" class="hidden ml-6 mt-2 space-y-2">
                        <li>
                            <a href="{{ route('admin.blog.categories') }}"
                                class="flex items-center p-2 text-white rounded-lg hover:bg-white/20 transition text-sm {{ request()->routeIs('admin.blog.categories*') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-tags w-4 text-xs"></i>
                                <span class="ml-2">Kategori</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.blog.posts') }}"
                                class="flex items-center p-2 text-white rounded-lg hover:bg-white/20 transition text-sm {{ request()->routeIs('admin.blog.posts*') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-newspaper w-4 text-xs"></i>
                                <span class="ml-2">Semua Artikel</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admin.company.edit') }}"
                        class="flex items-center p-3 text-white rounded-lg hover:bg-white/20 transition {{ request()->routeIs('admin.company.*') ? 'bg-white/20' : '' }}">
                        <i class="fas fa-building w-5"></i>
                        <span class="ml-3">Perusahaan</span>
                    </a>
                </li>

                <!-- Career Menu -->
                <li>
                    <button onclick="toggleCareerMenu()"
                        class="flex items-center justify-between w-full p-3 text-white rounded-lg hover:bg-white/20 transition {{ request()->routeIs('admin.career.*') ? 'bg-white/20' : '' }}">
                        <div class="flex items-center">
                            <i class="fas fa-briefcase w-5"></i>
                            <span class="ml-3">Karir</span>
                        </div>
                        <i class="fas fa-chevron-down text-sm" id="careerMenuIcon"></i>
                    </button>
                    <ul id="careerMenu" class="hidden ml-6 mt-2 space-y-2">
                        <li>
                            <a href="{{ route('admin.career.jobs') }}"
                                class="flex items-center p-2 text-white rounded-lg hover:bg-white/20 transition text-sm {{ request()->routeIs('admin.career.jobs*') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-briefcase w-4 text-xs"></i>
                                <span class="ml-2">Lowongan Kerja</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.career.applications') }}"
                                class="flex items-center p-2 text-white rounded-lg hover:bg-white/20 transition text-sm {{ request()->routeIs('admin.career.applications*') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-file-alt w-4 text-xs"></i>
                                <span class="ml-2">Lamaran</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Logout -->
            <div class="pt-4 mt-4 border-t border-white/20">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex items-center w-full p-3 text-white rounded-lg hover:bg-red-500 transition">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span class="ml-3">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="sm:ml-64">
        <!-- Navbar -->
        <nav class="bg-white border-b border-gray-200 px-4 py-3 sticky top-0 z-30 shadow-sm">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <button id="toggleSidebar" class="sm:hidden p-2 text-gray-500 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="ml-2">
                        <h1 class="text-xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                        <p class="text-xs text-gray-500">@yield('page-subtitle', '')</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Preview Website Link -->
                    @if(request()->routeIs('admin.home.*'))
                        <a href="{{ route('home') }}" target="_blank"
                            class="text-sm text-orange-600 hover:text-orange-700 font-medium hidden sm:flex items-center">
                            <i class="fas fa-external-link-alt mr-1"></i> Preview Website
                        </a>
                    @endif

                    @if(request()->routeIs('admin.blog.*'))
                        <a href="{{ route('blog') }}" target="_blank"
                            class="text-sm text-blue-600 hover:text-blue-700 font-medium hidden sm:flex items-center">
                            <i class="fas fa-external-link-alt mr-1"></i> Lihat Blog
                        </a>
                    @endif

                    @if(request()->routeIs('admin.career.*'))
                        <a href="{{ route('career') }}" target="_blank"
                            class="text-sm text-green-600 hover:text-green-700 font-medium hidden sm:flex items-center">
                            <i class="fas fa-external-link-alt mr-1"></i> Lihat Halaman Karir
                        </a>
                    @endif

                    @if(request()->routeIs('admin.company.*'))
                        <a href="{{ route('company') }}" target="_blank"
                            class="text-sm text-indigo-600 hover:text-indigo-700 font-medium hidden sm:flex items-center">
                            <i class="fas fa-external-link-alt mr-1"></i> Lihat Halaman Perusahaan
                        </a>
                    @endif

                    <!-- User Menu -->
                    <div class="flex items-center space-x-3">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ Auth::user()->role }}</p>
                        </div>
                        <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center text-white">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <main class="p-4 sm:p-6">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 600,
            easing: 'ease-in-out',
            once: true
        });

        // Toggle Sidebar Mobile
        document.getElementById('toggleSidebar').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        });

        // Toggle Product Menu Function
        function toggleProductMenu() {
            const menu = document.getElementById('productMenu');
            const icon = document.getElementById('productMenuIcon');
            menu.classList.toggle('hidden');
            icon.classList.toggle('fa-chevron-down');
            icon.classList.toggle('fa-chevron-up');
        }

        // Toggle Blog Menu Function
        function toggleBlogMenu() {
            const menu = document.getElementById('blogMenu');
            const icon = document.getElementById('blogMenuIcon');
            menu.classList.toggle('hidden');
            icon.classList.toggle('fa-chevron-down');
            icon.classList.toggle('fa-chevron-up');
        }

        // Toggle Career Menu Function
        function toggleCareerMenu() {
            const menu = document.getElementById('careerMenu');
            const icon = document.getElementById('careerMenuIcon');
            menu.classList.toggle('hidden');
            icon.classList.toggle('fa-chevron-down');
            icon.classList.toggle('fa-chevron-up');
        }

        // Auto open menus based on current page
        document.addEventListener('DOMContentLoaded', function () {
            const currentPath = window.location.pathname;

            // Auto open product menu if on product pages
            if (currentPath.includes('/admin/products')) {
                const menu = document.getElementById('productMenu');
                const icon = document.getElementById('productMenuIcon');
                menu.classList.remove('hidden');
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            }

            // Auto open blog menu if on blog pages
            if (currentPath.includes('/admin/blog')) {
                const menu = document.getElementById('blogMenu');
                const icon = document.getElementById('blogMenuIcon');
                menu.classList.remove('hidden');
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            }

            // Auto open career menu if on career pages
            if (currentPath.includes('/admin/career')) {
                const menu = document.getElementById('careerMenu');
                const icon = document.getElementById('careerMenuIcon');
                menu.classList.remove('hidden');
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            }
        });
    </script>

    @stack('scripts')
</body>

</html>