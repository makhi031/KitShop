<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $cart = $user->cart;
        if (!$cart) {
            $cart = Cart::create(['user_id' => $user->id]);
        }

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        $product = Product::findOrFail($productId);

        $cartItem = $cart->items()->where('product_id', $productId)->first();
        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->subtotal = $cartItem->quantity * $cartItem->price;
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $product->price,
                'subtotal' => $product->price * $quantity,
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Product added to cart.']);
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'cart_item_id' => 'required|exists:cart_items,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::user();
        $cartItem = \App\Models\CartItem::findOrFail($request->cart_item_id);
        if ($cartItem->cart->user_id !== $user->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $cartItem->quantity = $request->quantity;
        $cartItem->subtotal = $cartItem->price * $cartItem->quantity;
        $cartItem->save();

        $cart = $cartItem->cart;
        $cartTotal = $cart->items()->sum('subtotal');

        return response()->json([
            'success' => true,
            'quantity' => $cartItem->quantity,
            'subtotal' => number_format($cartItem->subtotal, 2),
            'cart_total' => number_format($cartTotal, 2),
        ]);
    }

    public function removeItem(Request $request)
    {
        $request->validate([
            'cart_item_id' => 'required|exists:cart_items,id',
        ]);

        $user = Auth::user();
        $cartItem = \App\Models\CartItem::findOrFail($request->cart_item_id);
        if ($cartItem->cart->user_id !== $user->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $cart = $cartItem->cart;
        $cartItem->delete();

        $cartTotal = $cart->items()->sum('subtotal');

        return response()->json([
            'success' => true,
            'cart_total' => number_format($cartTotal, 2),
        ]);
    }
}
