<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces'; // Nama tabel di database

    protected $fillable = ['name']; // Atribut yang diizinkan untuk mass assignment
}
