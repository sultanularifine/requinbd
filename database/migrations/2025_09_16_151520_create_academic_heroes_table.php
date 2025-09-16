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
        Schema::create('academic_heroes', function (Blueprint $table) {
             $table->id();
        $table->string('hero_title')->nullable();
        $table->string('hero_subtitle')->nullable();
        $table->text('hero_text')->nullable();
        $table->string('hero_image')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_heroes');
    }
};
