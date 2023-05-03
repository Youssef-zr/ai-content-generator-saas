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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('description', 255);
            $table->integer('price_monthly');
            $table->integer('price_yearly');
            $table->enum('type', ['paid', 'free']);
            $table->integer('word_limit');
            $table->integer('image_limit');
            $table->string('pp_monthly_plan')->nullable();
            $table->string('pp_yearly_plan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
