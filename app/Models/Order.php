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
        'status_order',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }
}
