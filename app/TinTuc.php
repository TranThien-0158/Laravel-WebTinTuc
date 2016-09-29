<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table = "tintuc";

    public function loaitin()
    {
    	return $this->belongsTo('App\LoaiTin','LoaiTin_id','id');
    }
    public function comment()
    {
    	return $this->hasMany('App\Comment','TinTuc_id','id');
    }
}
