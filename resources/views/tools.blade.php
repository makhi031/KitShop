@extends('layouts.app')

@section('content')
        <section class="max-w-7xl mx-auto py-16 px-4 md:px-8">
            <h1 class="text-3xl md:text-4xl font-extrabold mb-10 text-blue-900 text-center">Gunpla Tools & Accessories</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
                <!-- Tool Cards -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://cdn.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4973028505747_1.jpg" alt="GodHand Nippers" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">GodHand Ultimate Nippers</h3>
                    <span class="text-xs text-gray-500 mb-2">Nippers</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$49.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://cdn.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4973028505747_2.jpg" alt="Tamiya Tweezers" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">Tamiya Precision Tweezers</h3>
                    <span class="text-xs text-gray-500 mb-2">Tweezers</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$12.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://cdn.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4973028505747_3.jpg" alt="Gundam Marker Set" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">Gundam Marker Basic Set</h3>
                    <span class="text-xs text-gray-500 mb-2">Markers</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$14.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://cdn.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4973028505747_4.jpg" alt="Panel Line Accent Color" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">Tamiya Panel Line Accent</h3>
                    <span class="text-xs text-gray-500 mb-2">Panel Liner</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$7.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://cdn.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4973028505747_5.jpg" alt="Hobby Knife" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">Tamiya Modeler's Knife</h3>
                    <span class="text-xs text-gray-500 mb-2">Hobby Knife</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$9.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://cdn.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4973028505747_6.jpg" alt="Cutting Mat" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">A4 Cutting Mat</h3>
                    <span class="text-xs text-gray-500 mb-2">Cutting Mat</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$11.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://cdn.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4973028505747_7.jpg" alt="Sanding Sticks" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">GodHand Sanding Sticks Set</h3>
                    <span class="text-xs text-gray-500 mb-2">Sanding Sticks</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$8.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://cdn.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4973028505747_8.jpg" alt="Modeling File" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">Tamiya Modeling File</h3>
                    <span class="text-xs text-gray-500 mb-2">File</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$10.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://cdn.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4973028505747_9.jpg" alt="Plastic Cement" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">Mr. Cement S</h3>
                    <span class="text-xs text-gray-500 mb-2">Plastic Cement</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$5.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://cdn.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4973028505747_10.jpg" alt="Sandpaper Set" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">Tamiya Sandpaper Set</h3>
                    <span class="text-xs text-gray-500 mb-2">Sandpaper</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$6.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
            </div>
        </section>
@endsection
