@extends('layouts.app')

@section('content')
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
@endsection