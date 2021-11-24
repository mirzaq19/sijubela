<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'timestamps'];

    public function buyer_user()
    {
        return $this->belongsTo(BuyerUser::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
