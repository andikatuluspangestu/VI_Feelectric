<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_customer',
        'tanggal_order',
        'id_product',
        'jumlah',
        'subtotal',
        'status_order',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
