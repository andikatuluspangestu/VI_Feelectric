<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;
use Illuminate\Support\Facades\Session;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::where('expiry_date', '>=', now())->get();
        return view('v_voucher.index', compact('vouchers'));
    }

    public function apply(Request $request)
    {
        $voucher = Voucher::where('code', $request->code)->first();

        if (!$voucher) {
            return response()->json(['message' => 'Kode voucher tidak valid.'], 400);
        }

        // Cek apakah voucher masih berlaku
        $currentDate = now();
        if ($currentDate->greaterThan($voucher->expiry_date)) {
            return response()->json(['message' => 'Voucher sudah kadaluarsa.'], 400);
        }

        // Simpan diskon ke sesi
        Session::put('voucher', [
            'code' => $voucher->code,
            'discount_percentage' => $voucher->discount_percentage,
            'min_purchase' => $voucher->min_purchase
        ]);

        return response()->json([
            'message' => 'Voucher berhasil diterapkan.',
        ]);
    }
}


   
