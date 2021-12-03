<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'timestamps'];
    
    public function cart()
    {
        return $this->belongsToMany(Cart::class, DetailCart::class);
    }

    public function laptop_image()
    {
        return $this->hasMany(LaptopImage::class);
    }

    public function testimonial()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
