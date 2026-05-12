<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('restaurant_tables', function (Blueprint $table) {
            $table->id();                                      // Auto-incrementing primary key
            $table->string('table_number')->unique();          // e.g. "T1", "T2" — must be unique
            $table->unsignedTinyInteger('capacity');           // How many people it fits
            $table->enum('status', ['available', 'reserved', 'occupied'])->default('available');
            $table->timestamps();                              // created_at and updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('restaurant_tables');             // Undo: delete the table
    }
};