<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Menggunakan middleware auth untuk memastikan pengguna sudah login
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Mendapatkan pengguna yang login
        $user = Auth::user();

        // Mendapatkan semua produk
        $products = Product::all();

        // Mengirim data produk dan pengguna ke view
        return view('v_menu.index', compact('products', 'user'));
        
    }

    public function detail($id)
    {
        // Mendapatkan pengguna yang login
        $user = Auth::user();

        // Mencari produk berdasarkan ID atau gagal jika tidak ditemukan
        $product = Product::findOrFail($id);

        // Mencari produk terkait berdasarkan kategori yang sama, kecuali produk yang sedang dilihat
        $relatedProducts = Product::where('category_id', $product->category_id)
                                    ->where('id', '!=', $id)
                                    ->get();

        // Mengirim data ke view
        return view('v_menudetail.detail', compact('product', 'relatedProducts', 'user'));
    }
}
