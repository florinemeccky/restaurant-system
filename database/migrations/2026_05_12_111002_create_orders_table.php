<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->foreignId('table_id')
                  ->nullable()                     // Table is optional (could be takeaway)
                  ->constrained('restaurant_tables')
                  ->onDelete('set null');
            $table->enum('status', ['pending', 'accepted', 'preparing', 'ready', 'served'])
                  ->default('pending');
            $table->decimal('total_amount', 10, 2)->default(0.00);
            $table->dateTime('order_time');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};