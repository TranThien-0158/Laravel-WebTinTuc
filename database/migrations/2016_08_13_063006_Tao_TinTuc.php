<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaoTinTuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TinTuc', function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('alias');
            $table->text('summary');
            $table->longText('content');
            $table->string('image');
            $table->integer('highlight')->default(0);
            $table->integer('view')->default(0);
            $table->integer('LoaiTin_id')->unsigned();
            $table->foreign('LoaiTin_id')->references('id')->on('LoaiTin');
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
        Schema::drop('TinTuc');
    }
}
