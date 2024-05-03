<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesStatistic extends Model
{
    protected $fillable = [
        'id_product',
        'tanggal_sales',
        'jumlah_terjual',
    ];

    /**
     * Get the product that owns the sales statistic.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
