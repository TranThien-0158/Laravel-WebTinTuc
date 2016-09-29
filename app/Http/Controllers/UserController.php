<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
use Hash;

class UserController extends Controller
{
    public function getList()
    {
    	$user = User::orderBy('id','DESC')->get();
    	return view('admin.user.list_user',compact('user'));
    }
    public function getAdd()
    {
    	return view('admin.user.add_user');
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    		[
    			'txtUsername'	=>	'required|unique:users,name',
    			'txtEmail'		=>	'required|email|unique:users,email',
    			'txtMatKhau'	=>	'required|min:6',
    			'txtNhapLaiMatKhau'	=>	'required|same:txtMatKhau'
    		],
    		[
    			'txtUsername.required'	=>	'Bạn chưa nhập username',
    			'txtUsername.unique'	=>	'Username bạn vừa nhập đã tồn tại',
    			'txtEmail.required'		=>	'Bạn chưa nhập email',
    			'txtEmail.email'		=>	'Email bạn vừa nhập không đúng',
    			'txtEmail.unique'		=>	'Email bạn vừa nhập đã tồn tại',
    			'txtMatKhau.required'	=>	'Bạn chưa nhập mật khẩu',
    			'txtMatKhau.min'		=>	'Mật khẩu phải có ít nhất 6 kí tự',
    			'txtNhapLaiMatKhau.same'=>	'Hai mật khẩu không giống nhau',
    			'txtNhapLaiMatKhau.required'=>	'Bạn chưa nhập lại mật khẩu'

    		]);
    	$user = new User;
    	$user->name = $request->txtUsername;
    	$user->email = $request->txtEmail;
    	$user->password = Hash::make($request->txtMatKhau);
    	$user->level = $request->Quyen;
    	$user->remember_token = $request->input('_token');
    	$user->save();

    	return redirect('admin/user/add')->with('messages','Thêm thành công');
    }
    public function getEdit($id)
    {
    	$user = User::find($id);
    	return view('admin.user.edit_user',compact('user'));
    }
    public function postEdit(Request $request, $id)
    {
    	$user = User::find($id);
    	$this->validate($request,
    		[
    			'txtMatKhau'	=>	'required|min:6',
    			'txtNhapLaiMatKhau'	=>	'required|same:txtMatKhau'
    		],
    		[
    			'txtMatKhau.required'	=>	'Bạn chưa nhập mật khẩu',
    			'txtMatKhau.min'		=>	'Mật khẩu phải có ít nhất 6 kí tự',
    			'txtNhapLaiMatKhau.same'=>	'Hai mật khẩu không giống nhau',
    			'txtNhapLaiMatKhau.required'=>	'Bạn chưa nhập lại mật khẩu'		
    		]);
    	$user->name = $request->txtUsername;
    	$user->email = $request->txtEmail;
    	$user->password = Hash::make($request->txtMatKhau);
    	$user->level = $request->Quyen;
    	$user->remember_token = $request->input('_token');
    	$user->save();

    	return redirect('admin/user/list')->with('messages','Cập nhật thành công');
    }
    public function getDelete($id)
    {
    	$user = User::find($id);
    	$user->delete();
    	return redirect('admin/user/list')->with('messages','Đã xóa thành công');
    }
    public function getLogin()
    {
    	return view('admin.login');
    }
    public function postLogin(Request $request)
    {
    	$this->validate($request,
    		[
    			'email'	=>	'required',
    			'password'	=>	'required'
    		],
    		[
    			'email.required'	=>	'Bạn chưa nhập email',
    			'password.required'	=>	'Bạn chưa nhập password'		
    		]);
    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
    	{
    		if(Auth::user()->level == 1 || Auth::user()->level == 2)
    			return redirect('admin/theloai/list')->with('messages','Đăng nhập thành công');
    		else
    			return redirect('admin/login')->with('messages','Tài khoản của bạn không có quyền truy cập');
    	}
    	else
    	{
    		return redirect('admin/login')->with('messages','Email hoặc mật khẩu không chính xác');
    	}
    }
    public function getLogout()
    {
    	Auth::logout();
    	return redirect('admin/login');
    }
}
