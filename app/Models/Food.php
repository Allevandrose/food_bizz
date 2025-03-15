<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'description', 'price', 'unit','image'];

    // A food belongs to one category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // A food can have many orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
