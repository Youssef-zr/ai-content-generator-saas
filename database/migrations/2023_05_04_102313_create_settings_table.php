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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title', 255);
            $table->string('slogan', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('adress', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('version', 255)->nullable()->default('1.0.0');
            $table->string('logo')->nullable()->default('default.png');
            $table->string('favicon')->nullable()->default('default.png');

            $table->string('openai_api_key', 255);
            $table->string('default_max_tokens', 255);
            $table->unsignedBigInteger('engine_id');
            $table->foreign('engine_id')->references('id')->on('engines')->onDelete('cascade');

            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');

            $table->string('pp_client', 255);
            $table->string('pp_secret', 255);
            $table->enum('pp_env', ['sandbox', 'production'])->nullable()->default('sandbox');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
