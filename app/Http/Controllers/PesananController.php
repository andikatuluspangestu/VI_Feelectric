<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan ini untuk menggunakan fasilitas Auth

class PesananController extends Controller
{
    public function index()
    {
        // Mendapatkan data pengguna yang sedang login
        $user = Auth::user();

        // Jika tidak ada pengguna yang terautentikasi, redirect ke halaman login
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view this page.');
        }

        // Mendapatkan semua pesanan, jika Anda ingin hanya pesanan milik pengguna gunakan Pesanan::where('user_id', $user->id)->get();
        $pesanans = Pesanan::all();

        // Menambahkan variabel 'user' ke dalam view
        return view('v_pesanan.index', compact('user', 'pesanans'));
    }

    public function show($id)
    {
        // Mendapatkan data pengguna yang sedang login
        $user = Auth::user();

        // Memastikan bahwa pengguna terautentikasi
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view this page.');
        }

        // Mencari pesanan berdasarkan ID, dan akan mengembalikan 404 jika tidak ditemukan
        $pesanan = Pesanan::findOrFail($id);

        // Menambahkan variabel 'user' ke dalam view
        return view('v_pesanan.show', compact('user', 'pesanan'));
    }
}
