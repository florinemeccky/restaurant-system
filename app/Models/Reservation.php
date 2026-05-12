<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'table_id',
        'reservation_time',
        'end_time',
        'guest_count',
        'status',
    ];

    // Tell Laravel to treat these columns as date/time objects
    // This lets you do things like $reservation->reservation_time->format('d M Y')
    protected $casts = [
        'reservation_time' => 'datetime',
        'end_time'         => 'datetime',
    ];

    // ----------------
    // RELATIONSHIPS
    // ----------------

    // A reservation belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A reservation belongs to one restaurant table
    public function table()
    {
        return $this->belongsTo(RestaurantTable::class, 'table_id');
    }
}