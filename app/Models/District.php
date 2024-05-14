<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts'; // Nama tabel di database

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // Relasi lain atau fungsi tambahan bisa ditambahkan di sini
}