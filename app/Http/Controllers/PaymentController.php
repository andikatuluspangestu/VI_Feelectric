<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function dana(Order $order)
    {
        // Logika untuk pembayaran DANA
        return view('payment.dana', compact('cart'));
    }

    public function qris(Order $order)
    {
        // Logika untuk pembayaran QRIS
        return view('payment.qris', compact('cart'));
    }

    public function alfamart(Order $order)
    {
        // Logika untuk pembayaran Alfamart
        return view('payment.alfamart', compact('cart'));
    }
}
