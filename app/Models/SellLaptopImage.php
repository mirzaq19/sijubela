<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellLaptopImage extends Model
{
    use HasFactory;

    public function sell_laptop()
    {
        return $this->belongsTo(SellLaptop::class);
    }
}
