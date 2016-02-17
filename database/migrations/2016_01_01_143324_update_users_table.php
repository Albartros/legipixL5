<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Avatar & Background
            $table->enum('avatar', ['default', 'media', 'xbox'])->default('default');
            $table->enum('background', ['default', 'media'])->default('default');
            // Slug
            $table->string('slug')->unique();
            // Gamertag
            $table->unsignedInteger('gamertag_id');
            // Status
            $table->boolean('is_verified')->default(false);
            $table->string('token')->nullable()->default(null);
            // Stats
            $table->integer('posts')->default(0);
            $table->integer('topics')->default(0);
            // Application
            $table->timestamp('banned_until')->nullable()->default(null);
            $table->timestamp('online_at')->nullable()->default(null);
            $table->softDeletes();
            // Contact
            $table->string('ctc_facebook')->nullable()->default(null);
            $table->string('ctc_internet')->nullable()->default(null);
            $table->string('ctc_playstation')->nullable()->default(null);
            $table->string('ctc_skype')->nullable()->default(null);
            $table->string('ctc_steam')->nullable()->default(null);
            $table->string('ctc_twitch')->nullable()->default(null);
            $table->string('ctc_twitter')->nullable()->default(null);
            $table->string('ctc_youtube')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('background');
            $table->dropColumn('gamertag_id');
            $table->dropColumn('is_verified');
            $table->dropColumn('token');
            $table->dropColumn('posts');
            $table->dropColumn('topics');
            $table->dropColumn('banned_until');
            $table->dropColumn('online_at');
            $table->dropColumn('deleted_at');
            $table->dropColumn('ctc_facebook');
            $table->dropColumn('ctc_internet');
            $table->dropColumn('ctc_playstation');
            $table->dropColumn('ctc_skype');
            $table->dropColumn('ctc_steam');
            $table->dropColumn('ctc_twitch');
            $table->dropColumn('ctc_twitter');
            $table->dropColumn('ctc_youtube');
        });
    }
}
