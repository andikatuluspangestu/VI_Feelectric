<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Address;


class User extends Authenticatable
{
    use HasFactory, Notifiable;
    
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password', // Menambahkan password jika Anda mengelola password melalui form
        'profile_picture',
        'date_of_birth', // Tambahkan atribut tanggal lahir
        'gender', // Tambahkan atribut jenis kelamin
        'phone', // Tambahkan atribut nomor telepon
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


}
