<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Links to users table
            $table->foreignId('food_id')->constrained('foods')->onDelete('cascade'); // Links to foods table
            $table->integer('quantity'); // Quantity of the food ordered
            $table->enum('payment_method', ['cash', 'stripe']); // Payment method
            $table->enum('status', ['pending', 'paid', 'failed'])->default('pending'); // Order status
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
