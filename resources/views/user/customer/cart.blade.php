@extends('layouts.app')

@section('content')
        <section class="max-w-4xl mx-auto py-16 px-4 md:px-8">
            <h1 class="text-3xl md:text-4xl font-extrabold text-blue-900 mb-8 text-center">My Cart</h1>
            @auth
            @if($cartItems->isEmpty())
                <div class="text-center text-gray-500 py-20">
                    <svg class="mx-auto mb-4 w-16 h-16 text-blue-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m13-9l2 9m-5-9V6a2 2 0 10-4 0v7"/></svg>
                    <p class="text-lg">Your cart is empty. Start shopping and add some Gunpla kits!</p>
                    <a href="{{route('kits')}}" class="mt-6 inline-block bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition font-semibold">Shop Kits</a>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded-lg shadow">
                        <thead>
                            <tr class="bg-blue-50 text-blue-900">
                                <th class="py-3 px-4 text-left font-semibold">Product</th>
                                <th class="py-3 px-4 text-left font-semibold">Price</th>
                                <th class="py-3 px-4 text-left font-semibold">Quantity</th>
                                <th class="py-3 px-4 text-left font-semibold">Subtotal</th>
                                <th class="py-3 px-4 text-left font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                            <tr class="border-b border-gray-100">
                                <td class="py-4 px-4 flex items-center gap-4">
                                    <img src="{{ $item->product->image_path ? asset('storage/' . $item->product->image_path) : 'https://via.placeholder.com/100' }}" alt="{{ $item->product->name }}" class="w-20 h-30 rounded bg-white border">
                                    <div>
                                        <div class="font-semibold text-blue-900">{{ $item->product->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $item->product->category }}</div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 font-semibold text-red-600">${{ number_format($item->price, 2) }}</td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-2">
                                        <button class="quantity-btn px-2 py-1 bg-gray-200 rounded text-lg font-bold" data-action="decrement" data-id="{{ $item->id }}">-</button>
                                        <input type="number" min="1" class="quantity-input w-16 px-2 py-1 border border-gray-200 rounded text-center focus:ring-2 focus:ring-blue-300 focus:outline-none" value="{{ $item->quantity }}" data-id="{{ $item->id }}">
                                        <button class="quantity-btn px-2 py-1 bg-gray-200 rounded text-lg font-bold" data-action="increment" data-id="{{ $item->id }}">+</button>
                                    </div>
                                </td>
                                <td class="py-4 px-4 font-semibold" id="subtotal-{{ $item->id }}">${{ number_format($item->subtotal, 2) }}</td>
                                <td class="py-4 px-4">
                                    <button class="remove-item-btn text-red-600 hover:text-red-800 transition" title="Remove" data-id="{{ $item->id }}">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-between mt-8 gap-6">
                    <div class="text-lg font-semibold text-blue-900">Total: <span class="text-red-600" id="cart-total">${{ number_format($cartItems->sum('subtotal'), 2) }}</span></div>
                    <a href="{{route('checkout')}}" class="bg-yellow-400 text-blue-900 px-8 py-3 rounded font-bold text-lg hover:bg-yellow-300 transition">Proceed to Checkout</a>
                </div>
            @endif
            @else
            <div class="text-center text-gray-500 py-20">
                <svg class="mx-auto mb-4 w-16 h-16 text-blue-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m13-9l2 9m-5-9V6a2 2 0 10-4 0v7"/></svg>
                <p class="text-lg">Please log in to view your cart.</p>
                <a href="{{ route('login') }}" class="mt-6 inline-block bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition font-semibold">Log in</a>
            </div>
            @endauth
        </section>

        <!-- Remove Item Confirmation Modal -->
        <div id="removeModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md relative">
                <button class="absolute top-2 right-2 text-gray-400 hover:text-red-600 text-2xl font-bold" id="closeRemoveModalBtn">&times;</button>
                <h2 class="text-2xl font-bold mb-6 text-blue-900">Remove Item</h2>
                <p class="text-gray-600 mb-6">Are you sure you want to remove this item from your cart?</p>
                <div class="flex justify-end gap-2">
                    <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition" id="cancelRemoveBtn">Cancel</button>
                    <button class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition font-semibold" id="confirmRemoveBtn">Remove</button>
                </div>
            </div>
        </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        function updateQuantity(cartItemId, newQuantity, inputEl, subtotalEl, totalEl) {
            fetch("{{ route('cart.updateQuantity') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ cart_item_id: cartItemId, quantity: newQuantity })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    if (inputEl) inputEl.value = data.quantity;
                    if (subtotalEl) subtotalEl.textContent = '$' + data.subtotal;
                    if (totalEl) totalEl.textContent = '$' + data.cart_total;
                } else {
                    alert(data.error || 'Could not update quantity');
                }
            })
            .catch(() => alert('Could not update quantity'));
        }

        document.querySelectorAll('.quantity-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const action = this.getAttribute('data-action');
                const id = this.getAttribute('data-id');
                const input = document.querySelector('.quantity-input[data-id="' + id + '"]');
                let value = parseInt(input.value);
                if (action === 'increment') value++;
                if (action === 'decrement' && value > 1) value--;
                updateQuantity(id, value, input, document.getElementById('subtotal-' + id), document.getElementById('cart-total'));
            });
        });
        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', function() {
                let value = parseInt(this.value);
                if (isNaN(value) || value < 1) value = 1;
                this.value = value;
                const id = this.getAttribute('data-id');
                updateQuantity(id, value, this, document.getElementById('subtotal-' + id), document.getElementById('cart-total'));
            });
            input.addEventListener('blur', function() {
                let value = parseInt(this.value);
                if (isNaN(value) || value < 1) value = 1;
                this.value = value;
                const id = this.getAttribute('data-id');
                updateQuantity(id, value, this, document.getElementById('subtotal-' + id), document.getElementById('cart-total'));
            });
        });

        // Remove item functionality with modal
        const removeModal = document.getElementById('removeModal');
        const closeRemoveModalBtn = document.getElementById('closeRemoveModalBtn');
        const cancelRemoveBtn = document.getElementById('cancelRemoveBtn');
        const confirmRemoveBtn = document.getElementById('confirmRemoveBtn');
        let itemToRemove = null;

        function openRemoveModal(itemId) {
            itemToRemove = itemId;
            removeModal.classList.remove('hidden');
        }

        function closeRemoveModal() {
            removeModal.classList.add('hidden');
            itemToRemove = null;
        }

        function removeItem() {
            if (itemToRemove) {
                fetch("{{ route('cart.removeItem') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ cart_item_id: itemToRemove })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        // Remove the table row
                        const row = document.querySelector(`[data-id="${itemToRemove}"]`).closest('tr');
                        row.remove();
                        // Update cart total
                        document.getElementById('cart-total').textContent = '$' + data.cart_total;
                        // Check if cart is empty and reload page if needed
                        if (document.querySelectorAll('tbody tr').length === 0) {
                            location.reload();
                        }
                        closeRemoveModal();
                    } else {
                        alert(data.error || 'Could not remove item');
                    }
                })
                .catch(() => alert('Could not remove item'));
            }
        }

        document.querySelectorAll('.remove-item-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                openRemoveModal(id);
            });
        });

        closeRemoveModalBtn.addEventListener('click', closeRemoveModal);
        cancelRemoveBtn.addEventListener('click', closeRemoveModal);
        confirmRemoveBtn.addEventListener('click', removeItem);

        // Close modal when clicking outside
        removeModal.addEventListener('click', function(e) {
            if (e.target === removeModal) {
                closeRemoveModal();
            }
        });
    });
    </script>
@endsection
