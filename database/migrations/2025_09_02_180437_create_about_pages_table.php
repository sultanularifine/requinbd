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
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
        // Hero section
        $table->json('hero_images')->nullable(); // store multiple images as JSON
        $table->string('hero_title')->nullable();
        $table->string('hero_subtitle')->nullable();

        // About section
        $table->text('about_text1')->nullable();
        $table->text('about_text2')->nullable();

        // Mission & Vision
        $table->text('mission')->nullable();
        $table->text('vision')->nullable();

        

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};
