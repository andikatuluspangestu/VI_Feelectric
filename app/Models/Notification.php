<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'type', 'notifiable_type', 'notifiable_id', 'data', 'read_at'
    ];

    protected $casts = [
        'data' => 'array', // Menyimpan data sebagai array.
        'read_at' => 'datetime', // Mengubah read_at menjadi instance Carbon.
    ];

    // Contoh fungsi relasi jika Anda ingin menambahkannya
    public function notifiable()
    {
        return $this->morphTo();
    }
}
