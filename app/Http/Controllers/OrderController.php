<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::with(['orderItems'])->get();
        return view('orders.index', compact('orders'));
    }

    public function store(Request $request) {
        // Add validation and actual logic to store order based on your requirements
    }
}
