<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    use HasFactory;

    protected $table = 'instrukturs'; // Nama tabel sesuai dengan tabel database Anda

    protected $fillable = [
        'nama_instruktur',
        'email',
        'no_telp',
    ];

    // Relationship with other models (if any)
    // Misalnya, jika Instruktur memiliki banyak kursus, maka relasinya bisa seperti ini:
    public function kursus()
{
    return $this->hasMany(KursusBarista::class, 'id_instruktur');
}
}
