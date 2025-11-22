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
        Schema::create('lost_items', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->text('description');
            $table->string('photo');
            $table->string('category');
            $table->string('location_found');
            $table->integer('finder');
            $table->enum('status', ['lost', 'found', 'claimed'])->default('lost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lost_items');
    }
};
