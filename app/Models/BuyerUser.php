<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class BuyerUser extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id', 'timestamps'];

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function addresses()
    {
        return $this->belongsToMany(Address::class, DetailAddress::class);
    }

    public function testimonial()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function getAuthPassword()
    {
        return $this->buyer_password;
    }
}
