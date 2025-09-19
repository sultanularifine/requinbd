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
        Schema::create('sessions', function (Blueprint $table) {
           $table->id();
        $table->string('title');
        $table->string('icon')->nullable();
        $table->text('description')->nullable();
        $table->date('date')->nullable();
        $table->string('type')->nullable(); // Free or Paid
        $table->string('mode')->nullable(); // Zoom or On-site
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
