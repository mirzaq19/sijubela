<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerUser extends Model
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
}
