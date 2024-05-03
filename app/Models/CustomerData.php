<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerData extends Model
{
    use HasFactory;

    protected $fillable = ['id_customer', 'riwayat_pembelian'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }
}
