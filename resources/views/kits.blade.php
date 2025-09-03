@extends('layouts.app')

@section('content')
        <section class="max-w-7xl mx-auto py-16 px-4 md:px-8">
            <h1 class="text-3xl md:text-4xl font-extrabold mb-10 text-blue-900 text-center">Gundam Model Kits</h1>
            <!-- Search and Filters -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-10">
                <form class="flex-1 flex items-center gap-2" method="GET" action="#">
                    <input type="text" name="search" placeholder="Search kits..." class="w-full md:w-80 px-4 py-2 rounded border border-gray-200 focus:ring-2 focus:ring-blue-300 focus:outline-none text-base" />
                    <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition font-medium">Search</button>
                </form>
                <form class="flex flex-wrap gap-2 md:gap-4 items-center" method="GET" action="#">
                    <span class="text-sm text-gray-600 mr-2">Filter by Grade:</span>
                    <label class="flex items-center gap-1 cursor-pointer">
                        <input type="checkbox" name="grade[]" value="HG" class="accent-blue-700 rounded" />
                        <span class="text-sm">HG</span>
                    </label>
                    <label class="flex items-center gap-1 cursor-pointer">
                        <input type="checkbox" name="grade[]" value="RG" class="accent-blue-700 rounded" />
                        <span class="text-sm">RG</span>
                    </label>
                    <label class="flex items-center gap-1 cursor-pointer">
                        <input type="checkbox" name="grade[]" value="MG" class="accent-blue-700 rounded" />
                        <span class="text-sm">MG</span>
                    </label>
                    <label class="flex items-center gap-1 cursor-pointer">
                        <input type="checkbox" name="grade[]" value="PG" class="accent-blue-700 rounded" />
                        <span class="text-sm">PG</span>
                    </label>
                    <label class="flex items-center gap-1 cursor-pointer">
                        <input type="checkbox" name="grade[]" value="SD" class="accent-blue-700 rounded" />
                        <span class="text-sm">SD</span>
                    </label>
                </form>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
                <!-- Product Cards -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://www.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4573102616072_1.jpg" alt="RX-78-2 Gundam (HGUC)" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">RX-78-2 Gundam</h3>
                    <span class="text-xs text-gray-500 mb-2">HGUC</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$22.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://www.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4573102616065_1.jpg" alt="MS-06 Zaku II (HGUC)" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">MS-06 Zaku II</h3>
                    <span class="text-xs text-gray-500 mb-2">HGUC</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$19.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://www.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4573102616089_1.jpg" alt="Wing Gundam (RG)" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">Wing Gundam</h3>
                    <span class="text-xs text-gray-500 mb-2">RG</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$34.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://www.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4573102616096_1.jpg" alt="Unicorn Gundam (MG)" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">Unicorn Gundam</h3>
                    <span class="text-xs text-gray-500 mb-2">MG</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$49.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://www.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4573102616102_1.jpg" alt="Strike Freedom Gundam (RG)" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">Strike Freedom Gundam</h3>
                    <span class="text-xs text-gray-500 mb-2">RG</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$36.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://www.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4573102616119_1.jpg" alt="Sinanju (MG)" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">Sinanju</h3>
                    <span class="text-xs text-gray-500 mb-2">MG</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$54.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://www.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4573102616126_1.jpg" alt="Barbatos Lupus (HG)" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">Barbatos Lupus</h3>
                    <span class="text-xs text-gray-500 mb-2">HG</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$18.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://www.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4573102616133_1.jpg" alt="Gundam Exia (MG)" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">Gundam Exia</h3>
                    <span class="text-xs text-gray-500 mb-2">MG</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$42.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://www.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4573102616140_1.jpg" alt="Sazabi (RG)" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">Sazabi</h3>
                    <span class="text-xs text-gray-500 mb-2">RG</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$59.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                    <img src="https://www.gundamplanet.com/media/catalog/product/cache/1/image/600x/9df78eab33525d08d6e5fb8d27136e95/g/p/gp-4573102616157_1.jpg" alt="Freedom Gundam (HG)" class="w-36 h-36 object-contain mb-4">
                    <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">Freedom Gundam</h3>
                    <span class="text-xs text-gray-500 mb-2">HG</span>
                    <p class="text-lg font-bold text-red-600 mb-3">$21.99</p>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium">Add to Cart</button>
                </div>
            </div>
        </section>
@endsection
