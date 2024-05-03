<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_customer',
        'platform',
        'link',
    ];

    /**
     * Get the customer that owns the social media.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }
}
