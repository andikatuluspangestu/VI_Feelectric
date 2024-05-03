<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_customer',
        'id_order',
        'metode_pembayaran',
        'tanggal_transaction',
        'total_pembayaran',
    ];

    /**
     * Get the customer that owns the transaction.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    /**
     * Get the order associated with the transaction.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}
