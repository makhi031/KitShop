<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact | KitShop</title>
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
        <section class="max-w-xl mx-auto py-16 px-4 md:px-8">
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-blue-900 mb-4">Contact KitShop</h1>
                <p class="text-lg text-gray-700">Have a question, need help, or want to share your Gunpla journey? Reach out to us!</p>
            </div>
            <div class="bg-blue-50 rounded-lg p-8 mb-8">
                <form class="flex flex-col gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-blue-900 mb-1">Name</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-2 rounded border border-gray-200 focus:ring-2 focus:ring-blue-300 focus:outline-none text-base" placeholder="Your Name" required />
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-blue-900 mb-1">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 rounded border border-gray-200 focus:ring-2 focus:ring-blue-300 focus:outline-none text-base" placeholder="you@email.com" required />
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-blue-900 mb-1">Message</label>
                        <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 rounded border border-gray-200 focus:ring-2 focus:ring-blue-300 focus:outline-none text-base" placeholder="How can we help you?" required></textarea>
                    </div>
                    <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition font-semibold text-lg">Send Message</button>
                </form>
            </div>
            <div class="text-center">
                <div class="inline-flex items-center gap-2 text-blue-900 font-semibold text-lg">
                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 5.75C3 4.784 3.784 4 4.75 4h14.5A1.75 1.75 0 0 1 21 5.75v12.5A1.75 1.75 0 0 1 19.25 20H4.75A1.75 1.75 0 0 1 3 18.25V5.75Zm0 0L12 13l9-7.25" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <span>support@kitshop.com</span>
                </div>
                <div class="mt-4 inline-flex items-center gap-2 text-blue-900 font-semibold text-lg">
                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M2 6.5A3.5 3.5 0 0 1 5.5 3h13A3.5 3.5 0 0 1 22 6.5v11A3.5 3.5 0 0 1 18.5 21h-13A3.5 3.5 0 0 1 2 17.5v-11Z" stroke="currentColor" stroke-width="2"/><path d="M6 8h12M6 12h8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                    <span>+1 (555) 123-4567</span>
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
