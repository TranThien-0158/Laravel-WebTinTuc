<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TheLoai;

class TheLoaiController extends Controller
{
    //
    public function getList()
    {
    	$theloai = TheLoai::all();
    	return view('admin.theloai.list_theloai',['theloai'=> $theloai]);
    }
    public function getAdd()
    {
    	return view('admin.theloai.add_theloai');
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    		[
    			'txtTenTheLoai' => 'required|unique:theloai,name|min:5|max:100'
    		],
    		[
    			'txtTenTheLoai.required' 	=> 'Bạn chưa nhập tên thể loại',
    			'txtTenTheLoai.min'			=> 'Tên thể loại phải có độ dài từ 3 đến 100 kí tự',
    			'txtTenTheLoai.max'			=> 'Tên thể loại phải có độ dài từ 3 đến 100 kí tự',
    			'txtTenTheLoai.unique'		=> 'Tên thể loại vừa nhập đã tồn tại'
    		]);
    	$theloai = new TheLoai;
    	$theloai->name = $request->txtTenTheLoai;
    	$theloai->alias = changeTitle($request->txtTenTheLoai);
    	$theloai->save();

    	return redirect('admin/theloai/add')->with('messages','Thêm thành công');

    }
    public function getEdit($id)
    {
    	$theloai = TheLoai::find($id);
    	return view('admin.theloai.edit_theloai',['theloai'=>$theloai]);
    }
    public function postEdit(Request $request, $id)
    {
    	$theloai = TheLoai::find($id);
    	$this->validate($request,
    		[
    			'txtTenTheLoai' => 'required|unique:theloai,name|min:5|max:100'
    		],
    		[
    			'txtTenTheLoai.required' 	=> 'Bạn chưa nhập tên thể loại',
    			'txtTenTheLoai.min'			=> 'Tên thể loại phải có độ dài từ 3 đến 100 kí tự',
    			'txtTenTheLoai.max'			=> 'Tên thể loại phải có độ dài từ 3 đến 100 kí tự',
    			'txtTenTheLoai.unique'		=> 'Tên thể loại vừa nhập đã tồn tại'
    		]);
    	$theloai->name = $request->txtTenTheLoai;
    	$theloai->alias = changeTitle($request->txtTenTheLoai);
    	$theloai->save();

    	return redirect('admin/theloai/list')->with('messages','Cập nhật thành công');
    }
    public function getDelete($id)
    {
    	$theloai = TheLoai::find($id);
    	$theloai->delete();

    	return redirect('admin/theloai/list')->with('messages','Bạn đã xóa thành công');
    }
}
