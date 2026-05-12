<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                  ->constrained('menu_categories')
                  ->onDelete('cascade');           // If category deleted, delete its items too
            $table->string('name');                // e.g. "Grilled Chicken"
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);        // e.g. 12.99 (8 digits total, 2 decimal)
            $table->string('image')->nullable();   // File path to uploaded image
            $table->boolean('is_available')->default(true); // Can customers order this?
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};