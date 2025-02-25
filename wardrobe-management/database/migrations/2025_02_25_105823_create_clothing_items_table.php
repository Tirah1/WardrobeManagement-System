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
        Schema::create('clothing_items', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the clothing item
            $table->string('category'); // Category (e.g., tops, bottoms, shoes)
            $table->text('description')->nullable(); // Description of the item
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clothing_items');
    }
};