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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->integer('stars')->default(3);
            $table->string('location');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country')->default('India');
            $table->decimal('price', 10, 2)->default(0.00);
            $table->json('images')->nullable();
            $table->json('amenities')->nullable();
            $table->string('check_in_time')->default('12:00 PM');
            $table->string('check_out_time')->default('11:00 AM');
            $table->json('room_types')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
