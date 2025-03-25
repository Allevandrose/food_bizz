<?php
// database/migrations/xxxx_xx_xx_create_orders_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique(); // Unique order ID like FB-001
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('delivery_name');
            $table->string('delivery_email');
            $table->string('delivery_phone');
            $table->string('delivery_location'); // New location field
            $table->enum('payment_method', ['cash', 'stripe']);
            $table->enum('status', ['pending', 'paid', 'failed'])->default('pending');
            $table->decimal('total_amount', 8, 2); // Total order amount
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};