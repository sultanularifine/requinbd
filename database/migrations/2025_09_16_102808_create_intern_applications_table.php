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
        Schema::create('intern_applications', function (Blueprint $table) {
            $table->id();
        $table->string('formal_name');
        $table->string('email')->unique();
        $table->string('contact_no');
        $table->date('dob');
        $table->string('whatsapp_no');
        $table->string('facebook_profile')->nullable();
        $table->string('linkedin_profile')->nullable();
        $table->string('designation')->nullable();
        $table->string('institution');
        $table->text('present_address');
        $table->text('why_join');
        $table->string('cv');
        $table->string('photo');
        $table->unsignedBigInteger('department_id')->nullable();
        $table->enum('status', ['pending','approved','declined'])->default('pending');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intern_applications');
    }
};
