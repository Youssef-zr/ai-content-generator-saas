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
            $table->string('stripe_plan_id')->nullable();
            $table->string('stripe_product_id')->nullable();
            $table->string('name', 255);
            $table->string('description', 255);
            $table->enum('billing_interval', ['week', 'month','year'])->nullable();
            $table->string('currency', 255);
            $table->integer('price');
            $table->enum('type', ['paid', 'free']);
            $table->integer('word_limit');
            $table->integer('image_limit');
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
