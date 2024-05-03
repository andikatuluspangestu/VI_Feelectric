<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = ['id_customer', 'tanggal_feedback', 'isi_feedback'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }
}
