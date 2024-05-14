<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'status', 'detail', 'total'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
