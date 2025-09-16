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
        Schema::create('internships', function (Blueprint $table) {
           $table->id();
$table->string('title');
$table->text('description');
$table->string('duration')->nullable(); // <- Nullable now
$table->string('stipend')->nullable();
$table->enum('mode', ['Remote', 'On-site'])->default('Remote');
$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internships');
    }
};
