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
        Schema::create('directors', function (Blueprint $table) {


            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->string('department')->nullable();
            $table->string('duration_of_employment')->nullable();
            $table->date('birthday_certificate')->nullable();
            $table->date('birthday_original')->nullable();
            $table->string('email')->unique();
            $table->string('mobile_number')->nullable();
            $table->string('photo')->nullable(); // best photo (store path)
            $table->text('permanent_address')->nullable();
            $table->string('facebook_profile')->nullable();
            $table->string('linkedin_profile')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directors');
    }
};
