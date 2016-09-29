<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Comment;
use App\TinTuc;

class CommentController extends Controller
{
    public function getDelete($id)
    {
    	$comment = Comment::find($id);
    	$comment ->delete();

    	return redirect('admin/tintuc/edit/'.$comment->TinTuc_id)->with('messages','Xóa comment thành công');
    }
    public function postComment($id, Request $request)
    {
    	$comment = new Comment;
    	$tintuc = TinTuc::find($id);
    	$comment ->TinTuc_id = $id;
    	$comment ->User_id = Auth::user()->id;
    	$comment ->content = $request ->txtNoiDung;
    	$comment ->save();

    	return redirect("tintuc/$id/".$tintuc->alias.".html");
    }
}
