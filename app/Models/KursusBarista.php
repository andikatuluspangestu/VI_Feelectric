<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KursusBarista extends Model
{
    use HasFactory;

    protected $table = 'kursusbarista';

    protected $fillable = [
        'id_kursus',
        'id_admin',
        'id_instruktur',
        'nama_kursus',
        'deskripsi',
        'biaya',
        'tanggal_mulai',
        'tanggal_selesai',
        'durasi',
        'kapasitas_max',
    ];

    // Relationship with other models
    public function kursus()
    {
        return $this->hasMany(KursusBarista::class, 'id_kursus');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }

    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class, 'id_instruktur');
    }
}
