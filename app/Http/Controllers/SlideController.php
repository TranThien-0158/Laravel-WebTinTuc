<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Slide;

class SlideController extends Controller
{
    public function getList()
    {
    	$slide = Slide::all();
    	return view('admin.slide.list_slide',['slide'=>$slide]);
    }
    public function getAdd()
    {
    	return view('admin.slide.add_slide');
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    		[
    			'txtTenSlide'		=> 'required|unique:slide,name',
    			'txtNoiDung'			=> 'required',
    			'Hinh'					=> 'required|image'
    		],
    		[
    			'txtTenSlide.required'	=> 'Bạn chưa nhập tên slide',
    			'txtTenSlide.unique'	=> 'Tên slide vừa nhập đã tồn tại',
    			'txtNoiDung.required'	=> 'Bạn chưa nhập nội dung slide',
    			'Hinh.required'	=> 'Bạn chưa chọn Hình Ảnh',
    			'Hinh.image'	=> 'File bạn vừa chọn không phải là file hình'
    		]);
    	$slide = new Slide;
    	$slide->name = $request->txtTenSlide;
    	$slide->content = $request->txtNoiDung;
    	if($request->has('link'))
    	{
    		$slide->link = $request->txtLink;
    	}
    	if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $name = $file ->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/slide/".$Hinh)) {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/slide",$Hinh);
            $slide->image = $Hinh;
        }
        $slide->save();

        return redirect('admin/slide/add')->with('messages','Thêm thành công');
    }
    public function getEdit($id)
    {
    	$slide = Slide::find($id);
    	return view('admin.slide.edit_slide',['slide'=>$slide]);
    }
    public function postEdit(Request $request, $id)
    {
    	$slide = Slide::find($id);
    	$this->validate($request,
    		[
    			'txtTenSlide'		=> 'required',
    			'txtNoiDung'			=> 'required',
    			'Hinh'					=> 'image'
    		],
    		[
    			'txtTenSlide.required'	=> 'Bạn chưa nhập tên slide',
    			'txtNoiDung.required'	=> 'Bạn chưa nhập nội dung slide',
    			'Hinh.image'	=> 'File bạn vừa chọn không phải là file hình'
    		]);
    	$slide->name = $request->txtTenSlide;
    	$slide->content = $request->txtNoiDung;
    	if($request->has('link'))
    	{
    		$slide->link = $request->txtLink;
    	}
    	if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $name = $file ->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/slide/".$Hinh)) {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/slide",$Hinh);
            unlink("upload/slide/".$slide->image);
            $slide->image = $Hinh;
        }
        $slide->save();

        return redirect('admin/slide/list')->with('messages','Cập nhật thành công');
    }
    public function getDelete($id)
    {
    	$slide = Slide::find($id);
        unlink("upload/slide/".$slide->image);
        $slide->delete();

        return redirect('admin/slide/list')->with('messages','Đã xóa thành công');
    }
}
