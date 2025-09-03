@extends('layouts.admin')

@section('content')
<section class="py-12 px-4 md:px-8 max-w-6xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-extrabold text-blue-900">Products</h1>
        <button class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition font-semibold shadow" id="addProductBtn">Add Product</button>
    </div>
    <!-- Products Table -->
    <div class="bg-white rounded-xl shadow-md overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Stock</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                <!-- Example row -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">1</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-blue-900">RX-78-2 Gundam</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">HGUC</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 font-bold">$22.99</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">15</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm flex gap-2">
                        <button class="bg-yellow-400 text-blue-900 px-3 py-1 rounded hover:bg-yellow-500 font-semibold transition">Edit</button>
                        <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 font-semibold transition">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">2</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-blue-900">MS-06 Zaku II</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">HGUC</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 font-bold">$19.99</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">8</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm flex gap-2">
                        <button class="bg-yellow-400 text-blue-900 px-3 py-1 rounded hover:bg-yellow-500 font-semibold transition">Edit</button>
                        <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 font-semibold transition">Delete</button>
                    </td>
                </tr>
                <!-- More rows as needed -->
            </tbody>
        </table>
    </div>
    <!-- Add/Edit Product Modal (UI only) -->
    <div id="productModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md relative">
            <button class="absolute top-2 right-2 text-gray-400 hover:text-red-600 text-2xl font-bold" id="closeModalBtn">&times;</button>
            <h2 class="text-2xl font-bold mb-6 text-blue-900" id="modalTitle">Add Product</h2>
            <form>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-blue-900 mb-1">Name</label>
                    <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Product Name">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-blue-900 mb-1">Category</label>
                    <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Category">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-blue-900 mb-1">Price</label>
                    <input type="number" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Price">
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-blue-900 mb-1">Stock</label>
                    <input type="number" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Stock">
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition" id="cancelBtn">Cancel</button>
                    <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition font-semibold">Save</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Modal open/close logic (UI only)
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('productModal');
            const addBtn = document.getElementById('addProductBtn');
            const closeBtn = document.getElementById('closeModalBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            addBtn.addEventListener('click', () => modal.classList.remove('hidden'));
            closeBtn.addEventListener('click', () => modal.classList.add('hidden'));
            cancelBtn.addEventListener('click', () => modal.classList.add('hidden'));
        });
    </script>
</section>
@endsection
