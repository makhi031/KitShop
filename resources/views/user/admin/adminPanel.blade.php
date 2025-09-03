@extends('layouts.admin')

@section('content')
    <section class="relative flex items-center justify-center min-h-[320px] py-12 md:py-20">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-white to-red-50"></div>
        <div class="relative z-10 max-w-5xl mx-auto flex flex-col items-center justify-center px-4 md:px-8 w-full">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4 text-blue-900">Welcome, Admin!</h1>
            <p class="text-lg text-gray-700 mb-8 text-center">Manage your store, view orders, and oversee users from your dashboard.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 w-full mt-8">
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative border-t-4 border-blue-700">
                    <span class="absolute top-4 left-4 bg-blue-700 text-white text-xs px-3 py-1 rounded-full font-semibold">Orders</span>
                    <svg class="w-12 h-12 text-blue-700 mb-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="13" rx="2" stroke="currentColor" stroke-width="2" fill="white"/><path d="M16 3v4M8 3v4" stroke="red" stroke-width="2"/></svg>
                    <h3 class="font-semibold text-lg mb-2 text-blue-900">View Orders</h3>
                    <p class="text-gray-600 text-center">Check and manage all recent orders placed in the shop.</p>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative border-t-4 border-red-600">
                    <span class="absolute top-4 left-4 bg-red-600 text-white text-xs px-3 py-1 rounded-full font-semibold">Products</span>
                    <svg class="w-12 h-12 text-red-600 mb-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="4" y="4" width="16" height="16" rx="2" stroke="currentColor" stroke-width="2" fill="white"/><path d="M4 9h16" stroke="blue" stroke-width="2"/></svg>
                    <h3 class="font-semibold text-lg mb-2 text-blue-900">Manage Products</h3>
                    <p class="text-gray-600 text-center">Add, edit, or remove products from your inventory.</p>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative border-t-4 border-yellow-400">
                    <span class="absolute top-4 left-4 bg-yellow-400 text-blue-900 text-xs px-3 py-1 rounded-full font-semibold">Users</span>
                    <svg class="w-12 h-12 text-yellow-400 mb-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2" fill="white"/><path d="M4 20c0-2.21 3.582-4 8-4s8 1.79 8 4" stroke="currentColor" stroke-width="2" fill="none"/></svg>
                    <h3 class="font-semibold text-lg mb-2 text-blue-900">Manage Users</h3>
                    <p class="text-gray-600 text-center">View and manage registered users and their roles.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
