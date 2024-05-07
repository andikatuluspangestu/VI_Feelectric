<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaKursus extends Model
{
    use HasFactory;

    protected $table = 'pesertakursus';

    protected $fillable = [
        'id_customer',
        'id_kursus',
        'tanggal_pendaftaran',
        'status_pembayaran',
    ];

    // Relationship with other models
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    public function barista()
    {
        return $this->belongsTo(KursusBarista::class, 'id_kursus');
    }
}
