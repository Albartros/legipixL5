<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            // Info
            $table->string('name');
            // Metadata
            $table->boolean('is_locked')->default(false);
            $table->boolean('is_pinned')->default(false);
            $table->boolean('is_poll')->default(false);
            $table->integer('posts');
            $table->integer('views');
            // Tag
            $table->unsignedInteger('tag_id');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('topics');
    }
}
