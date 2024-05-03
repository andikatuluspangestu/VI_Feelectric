<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_order',
        'id_product',
        'jumlah',
        'subtotal',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }

    /**
     * Get the product that owns the order detail.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
