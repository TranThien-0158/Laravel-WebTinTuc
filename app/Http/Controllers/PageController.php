<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
use App\User;
use Hash;

class PageController extends Controller
{
	function __construct()
	{
		$theloai = TheLoai::all();
		$slide = Slide::all();
		view()->share('theloai',$theloai);
		view()->share('slide',$slide);

		if(Auth::check())
		{
			view()->share('nguoidung',Auth::user());
		}
	}
    function HomePage()
    {
    	return view('pages.homepage');
    }
    function Contact()
    {
    	return view('pages.contact');
    }
    function Loaitin($id)
    {
    	$loaitin = LoaiTin::find($id);
    	$tintuc = TinTuc::where('LoaiTin_id',$id)->paginate(5);
    	return view('pages.loaitin',compact('loaitin','tintuc'));
    }
    function Tintuc($id)
    {
    	$tintuc = TinTuc::find($id);
    	//Sắp xếp thứ tự comment mới nhất
    	$comment = $tintuc->comment->sortByDesc('created_at');
    	//Tin nổi bật
    	$tinnoibat = TinTuc::where('highlight',1)->take(4)->get();
    	//Tin liên quan
    	$tinlienquan = TinTuc::where('LoaiTin_id',$tintuc->LoaiTin_id)->take(4)->get();
    	return view('pages.tintuc',compact('tintuc','tinnoibat','tinlienquan','comment'));
    }
    function getLogin()
    {
    	return view('pages.login');
    }
    function postLogin(Request $request)
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
    		return redirect('homepage');
    	}
    	else
    	{
    		return redirect('login')->with('messages','Email hoặc mật khẩu không chính xác');
    	}
    }
    function getLogout()
    {
    	Auth::logout();
    	return redirect('homepage');
    }
    function getNguoidung()
    {
    	return view('pages.nguoidung');
    }
    function postNguoidung(Request $request)
    {
        $this->validate($request,
            [
                'name' =>  'required',
                'password'  =>  'required|min:6',
                'repassword'  =>  'required|same:password'
            ],
            [
                'name.required'    =>  'Bạn chưa nhập Username',
                'password.required' =>  'Bạn chưa nhập password',
                   'password.min'      => 'Password tối thiểu 6 kí tự',
                'rewpassword.required' =>  'Bạn chưa nhập lại password',
                'repassword.same'       => '2 password không khớp nhau'
            ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->password = Hash::make($request->repassword);
        $user->save();
        
        return redirect('nguoidung')->with('messages','Cập nhật thông tin thành công');
    }
    function getRegister()
    {
        return view('pages.register');
    }
    function postRegister(Request $request)
    {
        $this->validate($request,
            [
                'name' =>  'required',
                'email' => 'required|email|unique:users,email',
                'password'  =>  'required|min:6',
                'passwordAgain'  =>  'required|same:password'
            ],
            [
                'name.required'    =>  'Bạn chưa nhập Username',
                'email.required'     => 'Bạn chưa nhập email',
                'email.email'       => 'Email không đúng',
                'password.required' =>  'Bạn chưa nhập password',
                'password.min'      => 'Password tối thiểu 6 kí tự',
                'passwordAgain.required' =>  'Bạn chưa nhập lại password',
                'passwordAgain.same'       => '2 password không khớp nhau'
            ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = 0;
        $user->remember_token = $request->input('_token');
        $user->save();

        return redirect('homepage');
    }
}
