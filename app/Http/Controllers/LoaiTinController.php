<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\LoaiTin;
use App\TheLoai;
class LoaiTinController extends Controller
{
    //
    public function getList()
    {
    	$loaitin = LoaiTin::select('id','name','TheLoai_id')->orderBy('id','DESC')->get();
    	return view('admin.loaitin.list_loaitin',['loaitin'=>$loaitin]);
    }
    public function getAdd()
    {
    	$theloai = TheLoai::all();
    	return view('admin.loaitin.add_loaitin',['theloai'=>$theloai]);
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    		[
    			'txtTenLoaiTin'		=> 'required|unique:loaitin,name|max:100|min:3',
    			'TheLoai'			=> 'required'
    		],
    		[
    			'txtTenLoaiTin.required'	=> 'Bạn chưa nhập tên loại tin',
    			'txtTenLoaiTin.unique'	=> 'Tên loại tin vừa nhập đã tồn tại',
    			'txtTenLoaiTin.max'	=> 'Tên loại tin phải có độ dài từ 3 đến 100 kí tự',
    			'txtTenLoaiTin.min'	=> 'Tên loại tin phải có độ dài từ 3 đến 100 kí tự',
    			'TheLoai.required'	=> 'Bạn chưa chọn tên thể loại',
    		]);
    	$loaitin = new LoaiTin;
    	$loaitin ->name = $request->txtTenLoaiTin;
    	$loaitin ->alias = changeTitle($request->txtTenLoaiTin);
    	$loaitin ->TheLoai_id = $request->TheLoai;
    	$loaitin->save();

    	return redirect('admin/loaitin/add')->with('messages','Thêm thành công');
    }
    public function getEdit($id)
    {
    	$loaitin = LoaiTin::find($id);
    	$theloai = TheLoai::all();
    	return view('admin.loaitin.edit_loaitin',['loaitin'=>$loaitin, 'theloai'=>$theloai]);
    }
    public function postEdit(Request $request, $id)
    {
    	$loaitin = LoaiTin::find($id);
    	$this->validate($request,
    		[
    			'txtTenLoaiTin'		=> 'required|max:100|min:3',
    			'TheLoai'			=> 'required'
    		],
    		[
    			'txtTenLoaiTin.required'	=> 'Bạn chưa nhập tên loại tin',
    			'txtTenLoaiTin.max'	=> 'Tên loại tin phải có độ dài từ 3 đến 100 kí tự',
    			'txtTenLoaiTin.min'	=> 'Tên loại tin phải có độ dài từ 3 đến 100 kí tự',
    			'TheLoai.required'	=> 'Bạn chưa chọn tên thể loại',
    		]);
    	$loaitin ->name = $request->txtTenLoaiTin;
    	$loaitin ->alias = changeTitle($request->txtTenLoaiTin);
    	$loaitin ->TheLoai_id = $request->TheLoai;
    	$loaitin->save();

		return redirect('admin/loaitin/list')->with('messages','Bạn đã cập nhật thành công');
    }
    public function getDelete($id)
    {
    	$loaitin = LoaiTin::find($id);
    	$loaitin->delete();

    	return redirect('admin/loaitin/list')->with('messages','Bạn đã xóa thành công');
    }
}
