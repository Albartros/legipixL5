<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamertagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamertags', function (Blueprint $table) {
            // Application
            $table->increments('id');
            $table->timestamps();
            // User
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            // Status
            $table->boolean('is_verified')->default(false);
            $table->string('token')->nullable()->default(null);
            // Informations
            $table->boolean('gold');
            $table->string('avatar');
            $table->string('gamertag')->unique();
            $table->string('xuid')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gamertags');
    }
}
