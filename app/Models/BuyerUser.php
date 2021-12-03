<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class BuyerUser extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id', 'timestamps'];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getAuthPassword()
    {
        return $this->buyer_password;
    }
}
