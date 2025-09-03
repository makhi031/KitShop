@extends('layouts.admin')

@section('content')
<section class="py-12 px-4 md:px-8 max-w-6xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-extrabold text-blue-900">Orders</h1>
    </div>
    <!-- Orders Table -->
    <div class="bg-white rounded-xl shadow-md overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Order ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Customer</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Total</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                <!-- Example row -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">#1001</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-blue-900">Alex T.</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">2024-06-01</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm"><span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-semibold">Completed</span></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 font-bold">$49.99</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm flex gap-2">
                        <button class="bg-blue-700 text-white px-3 py-1 rounded hover:bg-blue-800 font-semibold transition">View</button>
                        <button class="bg-yellow-400 text-blue-900 px-3 py-1 rounded hover:bg-yellow-500 font-semibold transition">Update</button>
                        <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 font-semibold transition">Cancel</button>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">#1002</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-blue-900">Jamie L.</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">2024-06-02</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm"><span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-semibold">Pending</span></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 font-bold">$22.99</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm flex gap-2">
                        <button class="bg-blue-700 text-white px-3 py-1 rounded hover:bg-blue-800 font-semibold transition">View</button>
                        <button class="bg-yellow-400 text-blue-900 px-3 py-1 rounded hover:bg-yellow-500 font-semibold transition">Update</button>
                        <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 font-semibold transition">Cancel</button>
                    </td>
                </tr>
                <!-- More rows as needed -->
            </tbody>
        </table>
    </div>
</section>
@endsection
