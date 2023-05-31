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
        Schema::create('prompts', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['text', 'image']);
            $table->string('title', 255);
            $table->string('description', 255);
            $table->text('prompt');
            $table->integer('max_tokens')->nullable();
            $table->unsignedBigInteger('engine_id');
            $table->foreign('engine_id')->references('id')->on('engines')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('tone_id')->nullable();
            $table->foreign('tone_id')->references('id')->on('tones')->onDelete('Set Null');
            $table->json('questions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prompts');
    }
};
