<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function laptop()
    {
        return $this->belongsTo(Laptop::class);
    }

    public function testimonial()
    {
        return $this->hasOne(Testimonial::class);
    }
}
