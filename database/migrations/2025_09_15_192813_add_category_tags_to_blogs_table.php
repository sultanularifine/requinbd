<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::table('blogs', function (Blueprint $table) {
        if (!Schema::hasColumn('blogs', 'category')) {
            $table->string('category')->nullable()->after('sub_title');
        }
        if (!Schema::hasColumn('blogs', 'tags')) {
            $table->string('tags')->nullable()->after('category');
        }
    });

    DB::table('blogs')->whereNull('category')->update(['category' => 'General']);
    DB::table('blogs')->whereNull('tags')->update(['tags' => '']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
             Schema::table('blogs', function (Blueprint $table) {
        if (Schema::hasColumn('blogs', 'category')) {
            $table->dropColumn('category');
        }
        if (Schema::hasColumn('blogs', 'tags')) {
            $table->dropColumn('tags');
        }
    });
        });
    }
};
