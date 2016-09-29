<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    protected $table = "loaitin";

    public function theloai()
    {
    	return $this->belongsTo('App\TheLoai','TheLoai_id','id');
    }
    public function tintuc()
    {
    	return $this->hasMany('App\TinTuc','LoaiTin_id','id');
    }
}
