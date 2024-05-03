<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_order',
        'status_pengiriman',
    ];

    /**
     * Get the order that owns the tracking.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}
