@extends('layouts.admin')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="py-12 px-4 md:px-8 max-w-6xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-extrabold text-blue-900">Products</h1>
        <button class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition font-semibold shadow" id="addProductBtn">Add Product</button>
    </div>
    <!-- Alert Messages -->
    <div id="alertContainer" class="mb-6"></div>
    <!-- Products Table -->
    <div class="bg-white rounded-xl shadow-md overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200" id="productsTable">
            <thead class="bg-blue-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Stock</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100" id="productsTbody">
                <!-- Dynamic rows -->
            </tbody>
        </table>
    </div>
    <!-- Add/Edit Product Modal -->
    <div id="productModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-lg relative">
            <button class="absolute top-2 right-2 text-gray-400 hover:text-red-600 text-2xl font-bold" id="closeModalBtn">&times;</button>
            <h2 class="text-2xl font-bold mb-6 text-blue-900" id="modalTitle">Add Product</h2>
            <div id="modalErrors" class="mb-4"></div>
            <form id="productForm" enctype="multipart/form-data">
                <input type="hidden" id="productId" name="productId">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-blue-900 mb-1">Name</label>
                    <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <div class="text-red-500 text-xs mt-1" id="nameError"></div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-blue-900 mb-1">Category</label>
                    <select name="category" id="category" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">Select a category</option>
                    </select>
                    <div class="text-red-500 text-xs mt-1" id="categoryError"></div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-blue-900 mb-1">Price</label>
                    <input type="number" name="price" id="price" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <div class="text-red-500 text-xs mt-1" id="priceError"></div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-blue-900 mb-1">Stock</label>
                    <input type="number" name="stock" id="stock" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <div class="text-red-500 text-xs mt-1" id="stockError"></div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-blue-900 mb-1">Image</label>
                    <input type="file" name="image" id="image" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <div class="text-red-500 text-xs mt-1" id="imageError"></div>
                    <img id="previewImage" src="" alt="" class="mt-2 rounded shadow max-h-24 hidden">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-blue-900 mb-1">Description</label>
                    <textarea name="description" id="description" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    <div class="text-red-500 text-xs mt-1" id="descriptionError"></div>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition" id="cancelBtn">Cancel</button>
                    <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition font-semibold" id="submitBtn">Save</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Modal open/close logic
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('productModal');
            const addBtn = document.getElementById('addProductBtn');
            const closeBtn = document.getElementById('closeModalBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const form = document.getElementById('productForm');
            const modalTitle = document.getElementById('modalTitle');
            const previewImage = document.getElementById('previewImage');
            const alertContainer = document.getElementById('alertContainer');
            let editingId = null;
            let categories = [];

            function showAlert(message, type = 'success') {
                const alertDiv = document.createElement('div');
                alertDiv.className = `p-4 rounded-lg mb-4 ${type === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}`;
                alertDiv.textContent = message;
                alertContainer.innerHTML = '';
                alertContainer.appendChild(alertDiv);
                setTimeout(() => {
                    alertDiv.remove();
                }, 5000);
            }

            function clearErrors() {
                document.querySelectorAll('[id$="Error"]').forEach(el => el.textContent = '');
                document.getElementById('modalErrors').innerHTML = '';
            }

            function loadCategories() {
                fetch('/admin/categories/api')
                    .then(res => {
                        if (!res.ok) throw new Error('Network response was not ok');
                        return res.json();
                    })
                    .then(data => {
                        categories = data;
                        const categorySelect = document.getElementById('category');
                        categorySelect.innerHTML = '<option value="">Select a category</option>';
                        data.forEach(category => {
                            const option = document.createElement('option');
                            option.value = category.name;
                            option.textContent = category.name;
                            categorySelect.appendChild(option);
                        });
                    })
                    .catch(err => {
                        console.error('Error loading categories:', err);
                        showAlert('Error loading categories', 'error');
                    });
            }

            function openModal(edit = false, product = null) {
                modal.classList.remove('hidden');
                form.reset();
                previewImage.classList.add('hidden');
                clearErrors();
                if (edit && product) {
                    modalTitle.textContent = 'Edit Product';
                    document.getElementById('productId').value = product.id;
                    document.getElementById('name').value = product.name;
                    document.getElementById('category').value = product.category;
                    document.getElementById('price').value = product.price;
                    document.getElementById('stock').value = product.stock;
                    document.getElementById('description').value = product.description;
                    if (product.image_path) {
                        previewImage.src = '/storage/' + product.image_path;
                        previewImage.classList.remove('hidden');
                    }
                    editingId = product.id;
                } else {
                    modalTitle.textContent = 'Add Product';
                    editingId = null;
                }
            }
            function closeModal() {
                modal.classList.add('hidden');
                editingId = null;
                clearErrors();
            }
            addBtn.addEventListener('click', () => openModal());
            closeBtn.addEventListener('click', closeModal);
            cancelBtn.addEventListener('click', closeModal);

            // Load categories on page load
            loadCategories();

            // Load products
            function loadProducts() {
                fetch('/admin/products/api')
                    .then(res => {
                        if (!res.ok) throw new Error('Network response was not ok');
                        return res.json();
                    })
                    .then(products => {
                        const tbody = document.getElementById('productsTbody');
                        tbody.innerHTML = '';
                        products.forEach((product, idx) => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = `
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${idx + 1}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-blue-900">${product.name}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    ${product.image_path ? `<img src="/storage/${product.image_path}" alt="${product.name}" class="h-30 w-40 object-cover rounded shadow" />` : ''}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${product.category}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 font-bold">$${product.price}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${product.stock}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm flex gap-2">
                                    <button class="bg-yellow-400 text-blue-900 px-3 py-1 rounded hover:bg-yellow-500 font-semibold transition editBtn" data-id="${product.id}">Edit</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 font-semibold transition deleteBtn" data-id="${product.id}">Delete</button>
                                </td>
                            `;
                            tbody.appendChild(tr);
                        });
                        // Attach edit/delete events
                        document.querySelectorAll('.editBtn').forEach(btn => {
                            btn.addEventListener('click', function() {
                                const id = this.getAttribute('data-id');
                                fetch(`/admin/products/api/${id}`)
                                    .then(res => {
                                        if (!res.ok) throw new Error('Network response was not ok');
                                        return res.json();
                                    })
                                    .then(product => openModal(true, product))
                                    .catch(err => {
                                        console.error('Error:', err);
                                        showAlert('Error loading product details', 'error');
                                    });
                            });
                        });
                        document.querySelectorAll('.deleteBtn').forEach(btn => {
                            btn.addEventListener('click', function() {
                                const id = this.getAttribute('data-id');
                                if (confirm('Are you sure you want to delete this product?')) {
                                    fetch(`/admin/products/api/${id}`, {
                                        method: 'DELETE',
                                        headers: {
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                        }
                                    })
                                    .then(res => {
                                        if (!res.ok) throw new Error('Network response was not ok');
                                        return res.json();
                                    })
                                    .then(() => {
                                        showAlert('Product deleted successfully');
                                        loadProducts();
                                    })
                                    .catch(err => {
                                        console.error('Error:', err);
                                        showAlert('Error deleting product', 'error');
                                    });
                                }
                            });
                        });
                    })
                    .catch(err => {
                        console.error('Error:', err);
                        showAlert('Error loading products', 'error');
                    });
            }
            loadProducts();

            // Add/Edit product
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(form);
                let url = '/admin/products/api';
                let method = 'POST';
                if (editingId) {
                    url = `/admin/products/api/${editingId}`;
                }
                const submitBtn = document.getElementById('submitBtn');
                submitBtn.disabled = true;
                submitBtn.textContent = 'Saving...';
                fetch(url, {
                    method: method,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                })
                .then(res => {
                    if (!res.ok) {
                        if (res.status === 422) {
                            return res.json().then(data => {
                                throw new Error(JSON.stringify(data.errors));
                            });
                        }
                        throw new Error('Network response was not ok');
                    }
                    return res.json();
                })
                .then(() => {
                    showAlert(editingId ? 'Product updated successfully' : 'Product added successfully');
                    closeModal();
                    loadProducts();
                })
                .catch(err => {
                    console.error('Error:', err);
                    try {
                        const errors = JSON.parse(err.message);
                        // Display validation errors
                        Object.keys(errors).forEach(field => {
                            const errorElement = document.getElementById(field + 'Error');
                            if (errorElement) {
                                errorElement.textContent = errors[field][0];
                            }
                        });
                    } catch (e) {
                        showAlert('Error saving product', 'error');
                    }
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Save';
                });
            });

            // Image preview
            document.getElementById('image').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(ev) {
                        previewImage.src = ev.target.result;
                        previewImage.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</section>
@endsection
