<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'pickup_type',
        'pickup_time',
        'subtotal',
        'packaging_fee',
        'total'
    ];
}
