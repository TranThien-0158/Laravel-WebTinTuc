<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\LoaiTin;
class AjaxController extends Controller
{
    public function getLoaiTin($TheLoai_ID)
    {
    	$loaitin = LoaiTin::where('TheLoai_id',$TheLoai_ID)->get();
    	foreach ($loaitin as $item) {
    		echo "<option value='".$item->id."'>".$item->name."</option>";
    	}
    }
}
