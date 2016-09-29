<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table = "theloai";

    public function loaitin()
    {
    	return $this->hasMany('App\LoaiTin','TheLoai_id','id');
    }
    public function tintuc()
    {
    	return $this->hasManyThrough('App\TinTuc','App\LoaiTin','TheLoai_id','LoaiTin_id','id');
    }
}
