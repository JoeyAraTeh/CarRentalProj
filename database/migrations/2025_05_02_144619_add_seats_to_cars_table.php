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
    Schema::table('cars', function (Blueprint $table) {
        $table->unsignedTinyInteger('seats')->after('rental_price_per_day');
    });
}

public function down(): void
{
    Schema::table('cars', function (Blueprint $table) {
        $table->dropColumn('seats');
    });
}

};
