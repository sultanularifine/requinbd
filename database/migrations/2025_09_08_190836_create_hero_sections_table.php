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
        Schema::create('hero_sections', function (Blueprint $table) {
           $table->id();
        $table->string('title')->nullable();
        $table->text('subtitle')->nullable();
        $table->string('button_text')->nullable();
        $table->string('button_link')->nullable();
        $table->string('facebook')->nullable();
        $table->string('linkedin')->nullable();
        $table->string('instagram')->nullable();
        $table->string('image')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
