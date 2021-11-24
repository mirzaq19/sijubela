<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'timestamps'];

    public function buyer_users()
    {
        return $this->belongsToMany(BuyerUser::class, DetailAddress::class);
    }
}
