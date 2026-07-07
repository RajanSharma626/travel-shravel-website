<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category'); // Sedan, SUV, Minivans, MUV, Hatchback
            $table->decimal('price', 10, 2)->default(0.00);
            $table->integer('passengers')->default(4);
            $table->string('transmission')->default('Manual'); // Manual, Automatic
            $table->integer('bags')->default(2);
            $table->integer('doors')->default(4);
            $table->text('description')->nullable();
            $table->string('primary_image')->nullable();
            $table->json('images')->nullable();
            $table->json('features')->nullable(); // Free Cancellation, Pay at Pickup, Unlimited Mileage etc.
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->text('map_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
