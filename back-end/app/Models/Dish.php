<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    public function restaurant()
    {
        return $this->hasMany(Restaurant::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
}