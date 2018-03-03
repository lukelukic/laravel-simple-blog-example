<?php

use Illuminate\Support\Facades\Schema;
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
            $table->increments("id");
            $table->timestamps();
            $table->string("title", "50");
            $table->text("content");
            $table->string("description", 100);
            $table->unsignedInteger("picture_id");
            $table->unsignedInteger('user_id');

            $table->foreign("picture_id")->references('id')->on("pictures");
            $table->foreign("user_id")->references('id')->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
}
