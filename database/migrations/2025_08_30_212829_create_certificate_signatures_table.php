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
        Schema::create('certificate_signatures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id')->unique(); // 1 row per department
            $table->string('name1')->nullable();
            $table->string('designation1')->nullable();
            $table->string('signature1')->nullable();

            $table->string('name2')->nullable();
            $table->string('designation2')->nullable();
            $table->string('signature2')->nullable();

            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_signatures');
    }
};
