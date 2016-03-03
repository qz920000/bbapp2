<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->text('content');
            $table->string('tags', 255);
            $table->string('username', 255);
            $table->string('user_email', 255);
            $table->integer('category_id');
            $table->integer('postsource_id');
            $table->integer('urllink_id');
            $table->string('posttype', 255);// new or update
            $table->string('slug')->nullable();
            $table->tinyInteger('flag')->default(0);
            $table->tinyInteger('lock')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
