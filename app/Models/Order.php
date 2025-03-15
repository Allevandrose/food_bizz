<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'food_id', 'quantity', 'payment_method', 'status'];

    // An order belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // An order belongs to a food item
    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    // An order has one payment
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
