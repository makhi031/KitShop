<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all());
    }

    public function getCategories()
    {
        return response()->json(Category::all());
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'category' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'image' => 'nullable|image|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $validated['image_path'] = $request->file('image')->store('products', 'public');
            }

            $product = Product::create($validated);
            return response()->json($product, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while creating the product'], 500);
        }
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function update(Request $request, Product $product)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'category' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'image' => 'nullable|image|max:2048',
            ]);

            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($product->image_path) {
                    Storage::disk('public')->delete($product->image_path);
                }
                $validated['image_path'] = $request->file('image')->store('products', 'public');
            }

            $product->update($validated);
            return response()->json($product);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating the product'], 500);
        }
    }

    public function destroy(Product $product)
    {
        try {
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            $product->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the product'], 500);
        }
    }
}
