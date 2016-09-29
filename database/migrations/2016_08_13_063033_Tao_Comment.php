<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaoComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Comment',function(Blueprint $table){
            $table->increments('id');
            $table->string('content');
            $table->integer('User_id')->unsigned();
            $table->integer('TinTuc_id')->unsigned();
            $table->foreign('User_id')->references('id')->on('users');
            $table->foreign('TinTuc_id')->references('id')->on('TinTuc');
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
        Schema::drop('Comment');
    }
}
