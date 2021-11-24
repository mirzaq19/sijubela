<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'timestamps'];

    public function seller_user()
    {
        return $this->belongsTo(SellerUser::class);
    }
}
