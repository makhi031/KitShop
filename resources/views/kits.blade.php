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
                @php $isLoggedIn = auth()->check(); @endphp
                @forelse($products as $product)
                    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 flex flex-col items-center group relative">
                        <img src="{{ $product->image_path ? asset('storage/' . $product->image_path) : 'https://via.placeholder.com/150' }}" alt="{{ $product->name }}" class="w-36 h-36 object-contain mb-4">
                        <h3 class="font-semibold text-lg mb-1 text-center text-blue-900">{{ $product->name }}</h3>
                        <span class="text-xs text-gray-500 mb-2">{{ $product->category }}</span>
                        <p class="text-lg font-bold text-red-600 mb-3">${{ number_format($product->price, 2) }}</p>
                        @if($isLoggedIn)
                            <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium add-to-cart-btn" data-product-id="{{ $product->id }}">Add to Cart</button>
                        @else
                            <a href="{{ route('login') }}" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition w-full font-medium text-center block">Log in to Add to Cart</a>
                        @endif
                    </div>
                @empty
                    <div class="col-span-4 text-center text-gray-500">No products found.</div>
                @endforelse
            </div>
        </section>
        <div id="cart-alert" class="fixed top-5 right-5 z-50 hidden p-4 rounded-lg font-semibold"></div>

        <!-- Add to Cart Confirmation Modal -->
        <div id="addToCartModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md relative">
                <button class="absolute top-2 right-2 text-gray-400 hover:text-red-600 text-2xl font-bold" id="closeAddToCartModalBtn">&times;</button>
                <h2 class="text-2xl font-bold mb-6 text-blue-900">Add to Cart</h2>
                <div id="modalProductInfo" class="mb-6">
                    <!-- Product info will be populated here -->
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-blue-900 mb-2">Quantity</label>
                    <div class="flex items-center gap-2">
                        <button class="quantity-btn px-3 py-1 bg-gray-200 rounded text-lg font-bold" data-action="decrement">-</button>
                        <input type="number" min="1" class="quantity-input w-20 px-3 py-2 border border-gray-200 rounded text-center focus:ring-2 focus:ring-blue-300 focus:outline-none" value="1">
                        <button class="quantity-btn px-3 py-1 bg-gray-200 rounded text-lg font-bold" data-action="increment">+</button>
                    </div>
                </div>
                <div class="flex justify-end gap-2">
                    <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition" id="cancelAddToCartBtn">Cancel</button>
                    <button class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition font-semibold" id="confirmAddToCartBtn">Add to Cart</button>
                </div>
            </div>
        </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const alertBox = document.getElementById('cart-alert');
    const addToCartModal = document.getElementById('addToCartModal');
    const closeAddToCartModalBtn = document.getElementById('closeAddToCartModalBtn');
    const cancelAddToCartBtn = document.getElementById('cancelAddToCartBtn');
    const confirmAddToCartBtn = document.getElementById('confirmAddToCartBtn');
    const modalProductInfo = document.getElementById('modalProductInfo');
    const quantityInput = document.querySelector('#addToCartModal .quantity-input');
    let currentProduct = null;

    function showCartAlert(message, type = 'success') {
        alertBox.textContent = message;
        alertBox.className = `fixed top-5 right-5 z-50 p-4 rounded-lg font-semibold ${type === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}`;
        alertBox.classList.remove('hidden');
        setTimeout(() => alertBox.classList.add('hidden'), 3000);
    }

    function openAddToCartModal(product) {
        currentProduct = product;
        modalProductInfo.innerHTML = `
            <div class="flex items-center gap-4">
                <img src="${product.image_path ? '/storage/' + product.image_path : 'https://via.placeholder.com/100'}" alt="${product.name}" class="w-20 h-30 rounded bg-white border">
                <div>
                    <h3 class="font-semibold text-lg text-blue-900">${product.name}</h3>
                    <p class="text-sm text-gray-500">${product.category}</p>
                    <p class="text-lg font-bold text-red-600">$${parseFloat(product.price).toFixed(2)}</p>
                </div>
            </div>
        `;
        quantityInput.value = 1;
        addToCartModal.classList.remove('hidden');
    }

    function closeAddToCartModal() {
        addToCartModal.classList.add('hidden');
        currentProduct = null;
    }

    function addToCart() {
        if (currentProduct) {
            const quantity = parseInt(quantityInput.value) || 1;
            fetch("{{ route('cart.add') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ 
                    product_id: currentProduct.id,
                    quantity: quantity
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    showCartAlert(data.message, 'success');
                    closeAddToCartModal();
                } else {
                    showCartAlert(data.error || 'Could not add to cart', 'error');
                }
            })
            .catch(() => showCartAlert('Could not add to cart', 'error'));
        }
    }

    // Quantity controls in modal
    document.querySelectorAll('#addToCartModal .quantity-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const action = this.getAttribute('data-action');
            let value = parseInt(quantityInput.value) || 1;
            if (action === 'increment') value++;
            if (action === 'decrement' && value > 1) value--;
            quantityInput.value = value;
        });
    });

    // Add to cart button clicks
    document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            // Find the product data from the clicked button's parent
            const productCard = this.closest('.bg-white.rounded-xl');
            const product = {
                id: productId,
                name: productCard.querySelector('h3').textContent,
                category: productCard.querySelector('span').textContent,
                price: productCard.querySelector('p').textContent.replace('$', ''),
                image_path: productCard.querySelector('img').src.includes('/storage/') ? productCard.querySelector('img').src.split('/storage/')[1] : null
            };
            openAddToCartModal(product);
        });
    });

    // Modal event listeners
    closeAddToCartModalBtn.addEventListener('click', closeAddToCartModal);
    cancelAddToCartBtn.addEventListener('click', closeAddToCartModal);
    confirmAddToCartBtn.addEventListener('click', addToCart);

    // Close modal when clicking outside
    addToCartModal.addEventListener('click', function(e) {
        if (e.target === addToCartModal) {
            closeAddToCartModal();
        }
    });
});
</script>
@endpush
