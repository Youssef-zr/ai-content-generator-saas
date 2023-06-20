<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('designs', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title', 255)->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->string('hero_image')->nullable()->default('assets/dist/storage/settings/default.png');
            $table->string('hero_cta', 255)->nullable();
            $table->string('hero_promotion', 255)->nullable();

            $table->json('partners')->nullable();

            $table->string('story_title', 255)->nullable();
            $table->string('story_subtitle', 255)->nullable();
            $table->json('story_blocks')->nullable();
            $table->string('story_promotion', 255)->nullable();
            $table->string('story_browser_image', 255)->nullable()->default("assets/dist/storage/settings/default.png");
            $table->string('story_phone_image', 255)->nullable()->default("assets/dist/storage/settings/default.png");

            $table->string('pricing_title', 255)->nullable();
            $table->string('pricing_subtitle', 255)->nullable();
            $table->string('pricing_promotion', 255)->nullable();

            $table->string('testimonial_name', 255)->nullable();
            $table->string('testimonial_title', 255)->nullable();
            $table->string('testimonial_avatar', 255)->nullable()->default("assets/dist/storage/settings/default.png");
            $table->text('testimonial_review')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designs');
    }
};
