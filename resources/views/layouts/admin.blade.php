<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel - KitShop</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-white text-gray-900 min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-900 text-white flex flex-col min-h-screen py-8 px-4">
        <div class="flex items-center mb-10">
            <img src="{{ asset('kitshop_logo.png')}}" alt="KitShop Logo" width="48" class="mr-3">
            <span class="font-extrabold text-2xl tracking-tight">KitShop Admin</span>
        </div>
        <nav class="flex-1 flex flex-col gap-2">
            <a href="{{ route('admin.panel') }}" class="py-2 px-4 rounded hover:bg-blue-800 transition {{ request()->routeIs('admin.panel') ? 'bg-blue-800' : '' }}">Dashboard</a>
            <a href="{{ route('admin.orders') }}" class="py-2 px-4 rounded hover:bg-blue-800 transition">Orders</a>
            <a href="{{ route('admin.products') }}" class="py-2 px-4 rounded hover:bg-blue-800 transition">Products</a>
            <a href="{{ route('admin.users') }}" class="py-2 px-4 rounded hover:bg-blue-800 transition">Users</a>
            <a href="{{ route('home') }}" class="py-2 px-4 rounded hover:bg-blue-800 transition">Shop</a>
        </nav>
        <form method="POST" action="{{ route('logout') }}" class="mt-8">
            @csrf
            <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition font-semibold">Logout</button>
        </form>
        <footer class="text-blue-100 text-xs mt-auto pt-8 text-center">
            &copy; {{ date('Y') }} KitShop Admin. All rights reserved.
        </footer>
    </aside>
    <!-- Main Content -->
    <main class="flex-1 w-full bg-white min-h-screen">
        @yield('content')
    </main>
</body>
</html>
