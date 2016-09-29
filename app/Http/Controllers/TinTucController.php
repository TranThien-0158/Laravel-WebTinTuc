<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\LoaiTin;
use App\TinTuc;
use App\TheLoai;
use App\Comment;

class TinTucController extends Controller
{
    public function getList()
    {
    	$tintuc = TinTuc::orderBy('id','DESC')->get();
    	return view('admin.tintuc.list_tintuc',['tintuc'=>$tintuc]);
    }
    public function getAdd()
    {
    	$theloai = TheLoai::all();
    	$loaitin = LoaiTin::all();
    	return view('admin.tintuc.add_tintuc',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'txtTieuDe' =>  'required|unique:tintuc,title',
                'txtTomTat' =>  'required',
                'txtNoiDung'=>  'required',
                'Hinh'      =>  'required|image'
            ],
            [
                'txtTieuDe.required'    => 'Bạn chưa nhập tiêu đề của tin tức',
                'txtTieuDe.unique'    => 'Tiêu đề tin tức bạn vừa nhập đã tồn tại',
                'txtTomTat.required'    => 'Bạn chưa nhập tóm tắt nội dung tin tức',
                'txtNoiDung.required'   => 'Bạn chưa nhập nội dung của tin tức',
                'Hinh.required'         => 'Bạn chưa chọn hình ảnh',
                'Hinh.image'            => 'File bạn vừa chọn không phải là file ảnh'
            ]);
        $tintuc = new TinTuc;
        $tintuc ->title = $request->txtTieuDe;
        $tintuc ->alias = changeTitle($request->txtTieuDe);
        $tintuc ->summary = $request->txtTomTat;
        $tintuc ->content = $request->txtNoiDung;
        $tintuc ->LoaiTin_id = $request->LoaiTin;
        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $name = $file ->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/tintuc/".$Hinh)) {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            $tintuc->image = $Hinh;
        }
        $tintuc->save();

        return redirect('admin/tintuc/add')->with('messages','Thêm thành công');
    }
    public function getEdit($id)
    {
        
        $tintuc = TinTuc::find($id);
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        $comment = Comment::orderBy('id','DESC')->get();
        return view('admin.tintuc.edit_tintuc',['tintuc'=>$tintuc, 'theloai'=>$theloai, 'loaitin'=>$loaitin, 'comment'=>$comment]);
    }
    public function postEdit(Request $request, $id)
    {
        $tintuc = TinTuc::find($id);
        $this->validate($request,
            [
                'txtTieuDe' =>  'required',
                'txtTomTat' =>  'required',
                'txtNoiDung'=>  'required',
                'Hinh'      =>  'image'
            ],
            [
                'txtTieuDe.required'    => 'Bạn chưa nhập tiêu đề của tin tức',
                'txtTomTat.required'    => 'Bạn chưa nhập tóm tắt nội dung tin tức',
                'txtNoiDung.required'   => 'Bạn chưa nhập nội dung của tin tức',
                'Hinh.image'            => 'File bạn vừa chọn không phải là file ảnh'
            ]);
        $tintuc ->title = $request->txtTieuDe;
        $tintuc ->alias = changeTitle($request->txtTieuDe);
        $tintuc ->summary = $request->txtTomTat;
        $tintuc ->content = $request->txtNoiDung;
        $tintuc ->LoaiTin_id = $request->LoaiTin;
        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $name = $file ->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/tintuc/".$Hinh)) {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            unlink("upload/tintuc/".$tintuc->image);
            $tintuc->image = $Hinh;
        }
        $tintuc->save();

        return redirect('admin/tintuc/list')->with('messages','Cập nhật thành công');
    }
    public function getDelete($id)
    {
        $tintuc = TinTuc::find($id);
        unlink("upload/tintuc/".$tintuc->image);
        $tintuc->delete();

        return redirect('admin/tintuc/list')->with('messages','Đã xóa thành công');   
    }
}