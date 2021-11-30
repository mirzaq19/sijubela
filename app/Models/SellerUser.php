<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SellerUser extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id', 'timestamps'];

    public function bank()
    {
        return $this->hasMany(Bank::class);
    }

    public function sell_laptop()
    {
        return $this->hasMany(SellLaptop::class);
    }

    public function getAuthPassword()
    {
        return $this->seller_password;
    }
}
