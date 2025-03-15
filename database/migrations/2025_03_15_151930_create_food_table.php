<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Ensures category exists
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2); // Price with 8 digits total and 2 decimal places
            $table->integer('unit'); // Number of units
            $table->string('image')->nullable(); // Image file path
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
