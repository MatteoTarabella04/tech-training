<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function typology()
    {
        return $this->belongsToMany(Typology::class);
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }


}