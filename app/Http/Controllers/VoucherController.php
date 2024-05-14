<?php
namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class VoucherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user(); // Mendapatkan user yang sedang login
        $vouchers = Voucher::all();
        return view('v_voucher.index', compact('user', 'vouchers'));
    }

    public function show($id)
    {
        $user = Auth::user(); // Tambahkan ini juga jika Anda ingin menampilkan nama di halaman detail
        $voucher = Voucher::findOrFail($id);
        return view('v_voucher.show', compact('user', 'voucher'));
    }
}
