<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');           // If user deleted, delete their reservations
            $table->foreignId('table_id')
                  ->constrained('restaurant_tables')
                  ->onDelete('cascade');
            $table->dateTime('reservation_time');  // When the reservation starts
            $table->dateTime('end_time');           // When it ends (helps prevent double booking)
            $table->unsignedTinyInteger('guest_count'); // How many people
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])
                  ->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};