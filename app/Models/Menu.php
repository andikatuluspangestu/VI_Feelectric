<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name', 'description', 'category', 'variant', 'price_hot', 'price_ice', 'stock', 'photo_hot', 'photo_ice'];
}

