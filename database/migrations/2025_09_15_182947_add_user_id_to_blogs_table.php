<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            // user_id এবং author কলাম
            if (!Schema::hasColumn('blogs', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('id');
            }
            if (!Schema::hasColumn('blogs', 'author')) {
                $table->string('author')->nullable()->after('user_id');
            }

            // category এবং tags কলাম
            if (!Schema::hasColumn('blogs', 'category')) {
                $table->string('category')->nullable()->after('sub_title');
            }
            if (!Schema::hasColumn('blogs', 'tags')) {
                $table->string('tags')->nullable()->after('category');
            }
        });

        // Existing rows update
        $defaultUserId = DB::table('users')->value('id'); // প্রথম ইউজারের id
        DB::table('blogs')->whereNull('user_id')->update(['user_id' => $defaultUserId]);
        DB::table('blogs')->whereNull('author')->update(['author' => 'Admin']);
        DB::table('blogs')->whereNull('category')->update(['category' => 'General']);
        DB::table('blogs')->whereNull('tags')->update(['tags' => '']);

        // user_id non-nullable & foreign key
        Schema::table('blogs', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(false)->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Foreign key drop
            if (Schema::hasColumn('blogs', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('blogs', 'author')) {
                $table->dropColumn('author');
            }
            if (Schema::hasColumn('blogs', 'category')) {
                $table->dropColumn('category');
            }
            if (Schema::hasColumn('blogs', 'tags')) {
                $table->dropColumn('tags');
            }
        });
    }
};
