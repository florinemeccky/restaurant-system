<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image',
        'is_available',
    ];

    // Cast these columns to specific PHP types automatically
    protected $casts = [
        'price'        => 'decimal:2', // Always treated as a number with 2 decimal places
        'is_available' => 'boolean',   // Always treated as true/false
    ];

    // ----------------
    // RELATIONSHIPS
    // ----------------

    // A menu item belongs to one category
    public function category()
    {
        return $this->belongsTo(MenuCategory::class, 'category_id');
    }

    // A menu item can appear in many order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'menu_item_id');
    }
}