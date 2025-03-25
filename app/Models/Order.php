<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'order_number', 'delivery_name', 'delivery_email', 'delivery_phone',
        'delivery_location', 'payment_method', 'status', 'total_amount'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($order) {
            $order->order_number = 'FB-' . str_pad($order->id, 3, '0', STR_PAD_LEFT);
            $order->save();
        });
    }
}