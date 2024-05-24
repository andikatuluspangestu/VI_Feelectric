<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view this page.');
        }

        $carts = Cart::where('user_id', $user->id)->with('menu')->get();

        return view('v_cart.index', compact('carts'));
    }

    public function addToCart(Request $request, $id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to add items to cart.');
        }

        $menu = Menu::findOrFail($id);

        $cart = Cart::updateOrCreate(
            ['user_id' => $user->id, 'menu_id' => $menu->id],
            ['quantity' => $request->input('quantity', 1)]
        );

        return redirect()->route('v_cart.index')->with('success', 'Item added to cart!');
    }
}
