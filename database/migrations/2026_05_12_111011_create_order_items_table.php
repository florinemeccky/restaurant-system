<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')
                  ->constrained('orders')
                  ->onDelete('cascade');           // If order deleted, delete its items too
            $table->foreignId('menu_item_id')
                  ->constrained('menu_items')
                  ->onDelete('cascade');
            $table->unsignedInteger('quantity');   // How many of this item
            $table->decimal('unit_price', 8, 2);   // Price at time of order (in case price changes later)
            $table->decimal('subtotal', 10, 2);    // quantity × unit_price
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};