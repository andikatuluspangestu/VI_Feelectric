<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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
                $cartItem->size = $request->input('size');
                $cartItem->temperature = $request->input('temperature');

                // Simpan perubahan
                $cartItem->save();
            } else {
                // Jika item belum ada di keranjang, buat baru
                CartItem::create([
                    'user_id' => Auth::id(),
                    'product_id' => $productId,
                    'size' => $request->input('size'),
                    'temperature' => $request->input('temperature'),
                    'quantity' => $request->input('quantity', 1),
                    'notes' => $request->input('notes', ''),
                ]);
            }

            return response()->json(['message' => 'Product added to cart successfully']);
        } catch (\Exception $e) {
            Log::error('Error adding to cart: ' . $e->getMessage());
            return response()->json(['error' => 'Error adding to cart: ' . $e->getMessage()], 500);
        }
    }

  
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view this page.');
        }

        // Ambil item keranjang untuk user tersebut
        $cartItems = CartItem::where('user_id', $user->id)->with('product')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $discount = 0;
        if (Session::has('voucher')) {
            $voucher = Session::get('voucher');
            if ($total >= $voucher['min_purchase']) {
                $discount = $total * ($voucher['discount_percentage'] / 100);
            }
        }

        $finalTotal = $total - $discount;

        return view('v_cart.index', compact('user', 'cartItems', 'total', 'discount', 'finalTotal'));
    }




    public function update(Request $request, $cartItemId)
    {
        try {
            $cartItem = CartItem::findOrFail($cartItemId);
            $cartItem->quantity = $request->input('quantity');
            $cartItem->notes = $request->input('notes', '');
            $cartItem->size = $request->input('size');
            $cartItem->temperature = $request->input('temperature'); // Add temperature
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
