<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    // ----------------
    // RELATIONSHIPS
    // ----------------

    // A category has many menu items
    // e.g. "Starters" has many items like "Spring Rolls", "Soup", etc.
    public function menuItems()
    {
        return $this->hasMany(MenuItem::class, 'category_id');
    }
}