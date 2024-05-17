<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        try {
            $product = Product::findOrFail($productId);

            $cartItem = CartItem::where('user_id', Auth::id())
                                ->where('product_id', $productId)
                                ->first();

            if ($cartItem) {
                // Jika item sudah ada di keranjang, tambahkan kuantitas
                $cartItem->quantity += $request->input('quantity', 1);
                $cartItem->notes = $request->input('notes', '');
                $cartItem->save();
            } else {
                // Jika item belum ada di keranjang, buat baru
                CartItem::create([
                    'user_id' => Auth::id(),
                    'product_id' => $product->id,
                    'quantity' => $request->input('quantity', 1),
                    'notes' => $request->input('notes', ''),
                ]);
            }

            return response()->json(['message' => 'Product added to cart successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error adding to cart: ' . $e->getMessage()], 500);
        }
    }

    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view this page.');
        }

        $cartItems = CartItem::where('user_id', $user->id)->with('product')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('v_cart.index', compact('user', 'cartItems', 'total'));
    }

    public function update(Request $request, $cartItemId)
    {
        try {
            $cartItem = CartItem::findOrFail($cartItemId);
            $cartItem->quantity = $request->input('quantity');
            $cartItem->notes = $request->input('notes', '');
            $cartItem->save();

            return redirect()->route('v_cart.index')->with('success', 'Cart item updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('v_cart.index')->with('error', 'Error updating cart item: ' . $e->getMessage());
        }
    }

    public function remove($cartItemId)
    {
        try {
            $cartItem = CartItem::findOrFail($cartItemId);
            $cartItem->delete();

            return redirect()->route('v_cart.index')->with('success', 'Cart item removed successfully.');
        } catch (\Exception $e) {
            return redirect()->route('v_cart.index')->with('error', 'Error removing cart item: ' . $e->getMessage());
        }
    }
}
