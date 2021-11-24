<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function buyer_user()
    {
        return $this->belongsTo(BuyerUser::class);
    }

    public function laptop()
    {
        return $this->belongsToMany(Laptop::class, DetailCart::class);
    }
}
