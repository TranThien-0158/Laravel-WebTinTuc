<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";

    public function tintuc()
    {
    	return $this->belongsTo('App\TinTuc','TinTuc_id','id');
    }
    public function user()
    {
    	return $this->belongsTo('App\User','User_id','id');
    }
}
