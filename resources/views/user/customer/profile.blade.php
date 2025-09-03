@extends('layouts.app')

@section('content')
    <main class="flex-1 w-full bg-white">
        <section class="max-w-xl mx-auto py-16 px-4 md:px-8">
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-blue-900 mb-4">My Profile</h1>
                <p class="text-lg text-gray-700">Manage your account information and password.</p>
            </div>
            <div class="bg-blue-50 rounded-lg p-8 mb-8 flex flex-col items-center">
                <div class="mb-6">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=1e40af&color=fff&size=128" alt="Avatar" class="w-24 h-24 rounded-full border-4 border-blue-700 shadow">
                </div>
                <div class="mb-2 text-xl font-semibold text-blue-900">{{ Auth::user()->name }}</div>
                <div class="mb-4 text-gray-700">{{ Auth::user()->email }}</div>
            </div>
            <div class="bg-white rounded-lg shadow p-8">
                <h2 class="text-lg font-bold text-blue-900 mb-4">Update Password</h2>
                <form class="flex flex-col gap-4">
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-blue-900 mb-1">Current Password</label>
                        <input type="password" id="current_password" name="current_password" class="w-full px-4 py-2 rounded border border-gray-200 focus:ring-2 focus:ring-blue-300 focus:outline-none text-base" placeholder="Current password" required />
                    </div>
                    <div>
                        <label for="new_password" class="block text-sm font-medium text-blue-900 mb-1">New Password</label>
                        <input type="password" id="new_password" name="new_password" class="w-full px-4 py-2 rounded border border-gray-200 focus:ring-2 focus:ring-blue-300 focus:outline-none text-base" placeholder="New password" required />
                    </div>
                    <div>
                        <label for="new_password_confirmation" class="block text-sm font-medium text-blue-900 mb-1">Confirm New Password</label>
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="w-full px-4 py-2 rounded border border-gray-200 focus:ring-2 focus:ring-blue-300 focus:outline-none text-base" placeholder="Confirm new password" required />
                    </div>
                    <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition font-semibold text-lg">Update Password</button>
                </form>
            </div>
        </section>
    </main>
@endsection