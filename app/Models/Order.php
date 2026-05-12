<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'table_id',
        'status',
        'total_amount',
        'order_time',
    ];

    protected $casts = [
        'order_time'   => 'datetime',
        'total_amount' => 'decimal:2',
    ];

    // ----------------
    // RELATIONSHIPS
    // ----------------

    // An order belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // An order belongs to one restaurant table (optional)
    public function table()
    {
        return $this->belongsTo(RestaurantTable::class, 'table_id');
    }

    // An order has many order items
    // e.g. One order can have: 2x Burger, 1x Fries, 3x Juice
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}