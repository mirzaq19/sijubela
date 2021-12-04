<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SellLaptop extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function seller_user()
    {
        return $this->belongsTo(SellerUser::class);
    }

    public function sell_laptop_image()
    {
        return $this->hasMany(SellLaptopImage::class);
    }
}
