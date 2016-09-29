<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaoLoaiTin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LoaiTin',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('alias');
            $table->integer('TheLoai_id')->unsigned();
            $table->foreign('TheLoai_id')->references('id')->on('TheLoai');
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
        Schema::drop('LoaiTin');
    }
}
