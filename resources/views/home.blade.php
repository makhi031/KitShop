@extends('layouts.app')

@section('content')
        <!-- Hero Section -->
        <section class="relative flex items-center justify-center min-h-[420px] py-12 md:py-20">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-white to-red-50"></div>
            <div class="relative z-10 max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between px-4 md:px-8 w-full">
                <div class="max-w-xl">
                    <h1 class="text-4xl md:text-5xl font-extrabold mb-4 text-blue-900" style="letter-spacing:0.01em;">Build Your Legend with <span class="text-red-600">Gunpla</span> Model Kits</h1>
                    <p class="text-lg text-gray-700 mb-8">Experience the thrill of Gunpla with the iconic colors of the original Gundam. Shop the latest kits, tools, and accessories at KitShop!</p>
                    <a href="#shop" class="inline-block bg-blue-700 text-white px-8 py-3 rounded hover:bg-blue-800 transition font-semibold text-lg">Shop Now</a>
                </div>
                <div class="mt-10 md:mt-0 md:ml-12 flex-shrink-0">
                    <img src="https://4.bp.blogspot.com/-AvalRfOKnxo/VkLeUTJM2LI/AAAAAAAAA2E/OhONLa1hgi8/s1600/GUNPLA%2BCOLLECTION%2B%25289%2529.jpg" alt="Gunpla Collection" class="w-80 md:w-96 rounded-lg shadow-sm border-0 bg-white">
                </div>
            </div>
        </section>

        <!-- Featured Products -->
        <section id="shop" class="max-w-7xl mx-auto py-16 px-4 md:px-8">
            <h2 class="text-2xl md:text-3xl font-bold mb-10 text-center text-blue-900">Featured Gundam Kits</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
                <!-- Example Product Card -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <span class="absolute top-4 left-4 bg-red-500 text-white text-xs px-3 py-1 rounded-full font-semibold">New</span>
                    <img src="https://www.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4573102616072_1.jpg" alt="RX-78-2 Gundam" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">RX-78-2 Gundam (HGUC)</h3>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="ml-2 text-xs text-gray-400">120 reviews</span>
                    </div>
                    <p class="text-lg font-bold text-red-600 mb-3">$22.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <span class="absolute top-4 left-4 bg-yellow-400 text-blue-900 text-xs px-3 py-1 rounded-full font-semibold">Best Seller</span>
                    <img src="https://www.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4573102616065_1.jpg" alt="Zaku II" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">MS-06 Zaku II (HGUC)</h3>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="ml-2 text-xs text-gray-400">98 reviews</span>
                    </div>
                    <p class="text-lg font-bold text-red-600 mb-3">$19.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <span class="absolute top-4 left-4 bg-blue-700 text-white text-xs px-3 py-1 rounded-full font-semibold">RG</span>
                    <img src="https://www.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4573102616089_1.jpg" alt="Wing Gundam" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">Wing Gundam (RG)</h3>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="ml-2 text-xs text-gray-400">75 reviews</span>
                    </div>
                    <p class="text-lg font-bold text-red-600 mb-3">$34.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <span class="absolute top-4 left-4 bg-gray-700 text-white text-xs px-3 py-1 rounded-full font-semibold">MG</span>
                    <img src="https://www.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4573102616096_1.jpg" alt="Unicorn Gundam" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">Unicorn Gundam (MG)</h3>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="ml-2 text-xs text-gray-400">60 reviews</span>
                    </div>
                    <p class="text-lg font-bold text-red-600 mb-3">$49.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
            </div>
            <div class="text-center mt-10">
                <a href="#" class="inline-block text-blue-700 font-semibold hover:underline">View All Kits &rarr;</a>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="bg-white py-16 px-4 md:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <div class="flex flex-col items-center mb-6">
                    <svg class="w-12 h-12 text-blue-700 mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="yellow" stroke-width="2" fill="white"/><path d="M12 6v6l4 2" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <h2 class="text-2xl md:text-3xl font-bold mb-2 text-blue-900">About KitShop</h2>
                </div>
                <p class="text-gray-700 mb-8">KitShop is your one-stop shop for all things Gunpla! We are passionate about Gundam model kits and dedicated to bringing you the best selection, prices, and customer service. Whether you're a beginner or a seasoned builder, you'll find the perfect kit to suit your style and skill level.</p>
                <div class="bg-gray-50 rounded-lg p-6 flex flex-col items-center max-w-xl mx-auto">
                    <p class="italic text-gray-600 mb-2">“KitShop has the best selection and the fastest shipping. I found my dream kit here!”</p>
                    <div class="flex items-center gap-2">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Customer" class="w-10 h-10 rounded-full">
                        <span class="font-semibold text-blue-900">Alex T.</span>
                        <span class="text-xs text-gray-500">/ Gunpla Enthusiast</span>
                    </div>
                </div>
            </div>
        </section>
@endsection
