<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments("id");
            $table->timestamps();
            $table->text("content");
            $table->unsignedInteger("user_id");
            $table->unsignedInteger("post_id");

            $table->foreign("user_id")->references('id')->on('users')->onDelete("cascade");
            $table->foreign("post_id")->references('id')->on('posts')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            //
        });
    }
}
