<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities'; // Nama tabel di database

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    // Relasi lain atau fungsi tambahan bisa ditambahkan di sini
}