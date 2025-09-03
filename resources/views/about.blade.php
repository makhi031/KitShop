<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About | KitShop</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-white text-gray-900 min-h-screen flex flex-col">
    <!-- Header -->
    <header class="sticky top-0 z-30 bg-blue-900">
            <div class="max-w-7xl mx-auto flex items-center justify-between py-4 px-4 md:px-8">
                <div class="flex items-center gap-2">
                    <span class="font-extrabold text-xl tracking-tight text-white">KitShop</span>
                </div>
                <nav class="hidden md:flex gap-7 text-base font-medium">
                    <a href="{{route('home')}}" class="text-white hover:text-yellow-400 transition">Home</a>
                    <a href="{{route('kits')}}" class="text-blue-100 hover:text-yellow-400 transition">Model Kits</a>
                    <a href="{{route('tools')}}" class="text-blue-100 hover:text-yellow-400 transition">Tools</a>
                    <a href="{{route('about')}}" class="text-blue-100 hover:text-yellow-400 transition">About</a>
                    <a href="{{route('contact')}}" class="text-blue-100 hover:text-yellow-400 transition">Contact</a>
                </nav>
                <div class="flex items-center gap-3">
                    @if (Route::has('login'))
                        @auth
                            <!-- Profile Dropdown -->
                            <div class="relative group">
                                <button class="flex items-center justify-center w-9 h-9 rounded-full bg-blue-800 hover:bg-blue-700 focus:outline-none" id="profile-menu-btn">
                                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2" fill="white"/><path d="M4 20c0-2.21 3.582-4 8-4s8 1.79 8 4" stroke="currentColor" stroke-width="2" fill="none"/></svg>
                                </button>
                                <div class="hidden group-hover:block absolute right-0 mt-2 w-40 bg-white rounded shadow-lg py-2 z-40 border border-gray-100 text-blue-900" id="profile-menu">
                                    <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-blue-50">Profile</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-blue-50">Logout</button>
                                    </form>
                                </div>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const btn = document.getElementById('profile-menu-btn');
                                    const menu = document.getElementById('profile-menu');
                                    if (btn && menu) {
                                        btn.addEventListener('click', function(e) {
                                            e.stopPropagation();
                                            menu.classList.toggle('hidden');
                                        });
                                        document.addEventListener('click', function(e) {
                                            if (!btn.contains(e.target)) {
                                                menu.classList.add('hidden');
                                            }
                                        });
                                    }
                                });
                            </script>
                        @else
                            <a href="{{ route('login') }}" class="text-yellow-400 hover:text-white transition font-semibold px-2">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-white hover:text-yellow-400 transition font-semibold px-2">Register</a>
                            @endif
                        @endauth
                    @endif
                    @auth
                        <a href="{{route('cart')}}" class="relative group">
                            <svg class="w-6 h-6 text-white group-hover:text-yellow-400 transition" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m13-9l2 9m-5-9V6a2 2 0 10-4 0v7"/></svg>
                            <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-1.5 py-0.5">0</span>
                        </a>
                    @endauth
                    <!-- Mobile menu button -->
                    <button class="md:hidden ml-2 p-2 rounded hover:bg-blue-800 focus:outline-none" id="mobile-menu-btn">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
            <div class="md:hidden hidden flex-col gap-2 px-6 pb-4 bg-blue-900" id="mobile-menu">
                <a href="#" class="block py-2 text-base font-medium text-white hover:text-yellow-400 transition">Home</a>
                <a href="#shop" class="block py-2 text-base font-medium text-blue-100 hover:text-yellow-400 transition">Model Kits</a>
                <a href="#shop" class="block py-2 text-base font-medium text-blue-100 hover:text-yellow-400 transition">Tools</a>
                <a href="#about" class="block py-2 text-base font-medium text-blue-100 hover:text-yellow-400 transition">About</a>
                <a href="#contact" class="block py-2 text-base font-medium text-blue-100 hover:text-yellow-400 transition">Contact</a>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const btn = document.getElementById('mobile-menu-btn');
                    const menu = document.getElementById('mobile-menu');
                    if (btn && menu) {
                        btn.addEventListener('click', () => {
                            menu.classList.toggle('hidden');
                        });
                    }
                });
            </script>
        </header>

    <main class="flex-1 w-full bg-white">
        <section class="max-w-3xl mx-auto py-16 px-4 md:px-8">
            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-4xl font-extrabold text-blue-900 mb-4">About KitShop</h1>
                <p class="text-lg text-gray-700 max-w-2xl mx-auto">KitShop is your trusted destination for all things Gunpla. Whether you’re a beginner or a seasoned builder, we’re here to help you build, customize, and display your favorite Mobile Suits with pride.</p>
            </div>
            <div class="bg-blue-50 rounded-lg p-8 mb-10">
                <h2 class="text-xl font-bold text-blue-800 mb-2">Our Story</h2>
                <p class="text-gray-700 mb-2">Founded by passionate builders, KitShop was created to make the world of Gunpla accessible to everyone. We believe that building model kits is more than a hobby—it's a way to express creativity, develop skills, and connect with a global community.</p>
                <p class="text-gray-700">From the latest releases to classic kits, we curate our selection to ensure you have access to the best products, tools, and accessories for your Gunpla journey.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-6 mb-10">
                <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                    <svg class="w-10 h-10 text-blue-700 mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="yellow" stroke-width="2" fill="white"/><path d="M12 6v6l4 2" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <h3 class="font-semibold text-blue-900 mb-1">Curated Selection</h3>
                    <p class="text-sm text-gray-600 text-center">We offer a wide range of Gunpla kits, tools, and accessories, handpicked for quality and authenticity.</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                    <svg class="w-10 h-10 text-blue-700 mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="4" y="4" width="16" height="16" rx="4" stroke="yellow" stroke-width="2" fill="white"/><path d="M8 12h8M12 8v8" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <h3 class="font-semibold text-blue-900 mb-1">Expert Service</h3>
                    <p class="text-sm text-gray-600 text-center">Our team is always ready to help, from kit recommendations to building tips and after-sales support.</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                    <svg class="w-10 h-10 text-blue-700 mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2a10 10 0 100 20 10 10 0 000-20z" stroke="yellow" stroke-width="2" fill="white"/><path d="M8 12l2 2 4-4" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <h3 class="font-semibold text-blue-900 mb-1">Community</h3>
                    <p class="text-sm text-gray-600 text-center">Join our growing community of builders, share your work, and get inspired by others’ creations.</p>
                </div>
            </div>
            <div class="bg-gray-50 rounded-lg p-6 flex flex-col items-center max-w-xl mx-auto">
                <p class="italic text-gray-600 mb-2">“KitShop helped me find rare kits and gave me the confidence to try custom builds. The community is amazing!”</p>
                <div class="flex items-center gap-2">
                    <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Customer" class="w-10 h-10 rounded-full">
                    <span class="font-semibold text-blue-900">Jordan P.</span>
                    <span class="text-xs text-gray-500">/ Gunpla Builder</span>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-900 text-blue-100 py-10 mt-auto">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between px-4 md:px-8 gap-6">
            <div class="flex items-center gap-2 mb-4 md:mb-0">
                <span class="font-extrabold text-lg tracking-tight text-white">KitShop</span>
            </div>
            <div class="flex gap-6 text-base font-medium">
                <a href="{{route('home')}}" class="hover:text-yellow-400 transition">Home</a>
                <a href="{{route('kits')}}" class="hover:text-yellow-400 transition">Model Kits</a>
                <a href="{{route('tools')}}" class="hover:text-yellow-400 transition">Tools</a>
                <a href="{{route('about')}}" class="hover:text-yellow-400 transition">About</a>
                <a href="{{route('contact')}}" class="hover:text-yellow-400 transition">Contact</a>
            </div>
            <div class="flex gap-4 mt-4 md:mt-0">
                <a href="#" aria-label="Instagram" class="hover:text-yellow-400 transition"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5" stroke="yellow" stroke-width="2" fill="none"/><rect x="2" y="2" width="20" height="20" rx="5" stroke="white" stroke-width="2" fill="none"/><circle cx="18" cy="6" r="1" fill="red"/></svg></a>
                <a href="#" aria-label="Twitter" class="hover:text-yellow-400 transition"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22.46 5.924c-.793.352-1.646.59-2.542.698a4.48 4.48 0 0 0 1.963-2.475a8.94 8.94 0 0 1-2.828 1.082a4.48 4.48 0 0 0-7.635 4.086A12.72 12.72 0 0 1 3.11 4.86a4.48 4.48 0 0 0 1.388 5.976a4.47 4.47 0 0 1-2.03-.561v.057a4.48 4.48 0 0 0 3.594 4.393a4.5 4.5 0 0 1-2.025.077a4.48 4.48 0 0 0 4.184 3.114A8.98 8.98 0 0 1 2 19.54a12.67 12.67 0 0 0 6.88 2.017c8.26 0 12.78-6.84 12.78-12.77c0-.195-.004-.39-.013-.583A9.1 9.1 0 0 0 24 4.59a8.93 8.93 0 0 1-2.54.697z" stroke="yellow"/></svg></a>
            </div>
        </div>
        <div class="text-center text-xs text-blue-200 mt-6">
            &copy; {{ date('Y') }} KitShop. All rights reserved.
        </div>
    </footer>
</body>
</html>

