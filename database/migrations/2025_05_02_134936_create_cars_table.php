<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->string('category'); // Added category column
            $table->string('type'); // e.g. SUV, Sedan, Hatchback
            $table->year('year');
            $table->decimal('rental_price_per_day', 8, 2);
            $table->text('description')->nullable();
            $table->string('image')->nullable(); // path to image
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
