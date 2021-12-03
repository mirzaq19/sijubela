<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function laptop_image()
    {
        return $this->hasMany(LaptopImage::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
