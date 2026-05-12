<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestaurantTable extends Model
{
    use HasFactory;

    // Tells Laravel which table this model uses
    // (Laravel would guess "restaurant_tables" automatically, but being explicit is good practice)
    protected $table = 'restaurant_tables';

    // These are the columns we allow to be mass-assigned
    // (filled all at once via a form submission)
    protected $fillable = [
        'table_number',
        'capacity',
        'status',
    ];

    // ----------------
    // RELATIONSHIPS
    // ----------------

    // A restaurant table can have many reservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'table_id');
    }

    // A restaurant table can have many orders
    public function orders()
    {
        return $this->hasMany(Order::class, 'table_id');
    }
}