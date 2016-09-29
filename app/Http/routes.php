<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login','UserController@getLogin');
Route::post('admin/login','UserController@postLogin');
Route::get('admin/logout','UserController@getLogout');

Route::group(['prefix'=>'admin','middleware'=>'AdminLogin'], function(){
	Route::group(['prefix'=>'theloai'],function(){
		Route::get('list',['as'=>'admin.theloai.getList','uses'=>'TheLoaiController@getList']);
		Route::get('edit/{id}',['as'=>'admin.theloai.getEdit','uses'=>'TheLoaiController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.theloai.postEdit','uses'=>'TheLoaiController@postEdit']);
		Route::get('add',['as'=>'admin.theloai.getAdd','uses'=>'TheLoaiController@getAdd']);
		Route::post('add',['as'=>'admin.theloai.postAdd','uses'=>'TheLoaiController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.theloai.getDelete','uses'=>'TheLoaiController@getDelete']);
	});
	Route::group(['prefix'=>'loaitin'],function(){
		Route::get('list',['as'=>'admin.loaitin.getList','uses'=>'LoaiTinController@getList']);
		Route::get('edit/{id}',['as'=>'admin.loaitin.getEdit','uses'=>'LoaiTinController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.loaitin.postEdit','uses'=>'LoaiTinController@postEdit']);
		Route::get('add',['as'=>'admin.loaitin.getAdd','uses'=>'LoaiTinController@getAdd']);
		Route::post('add',['as'=>'admin.loaitin.postAdd','uses'=>'LoaiTinController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.loaitin.getDelete','uses'=>'LoaiTinController@getDelete']);
	});
	Route::group(['prefix'=>'tintuc'],function(){
		Route::get('list',['as'=>'admin.tintuc.getList','uses'=>'TinTucController@getList']);
		Route::get('edit/{id}',['as'=>'admin.tintuc.getEdit','uses'=>'TinTucController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.tintuc.postEdit','uses'=>'TinTucController@postEdit']);
		Route::get('add',['as'=>'admin.tintuc.getAdd','uses'=>'TinTucController@getAdd']);
		Route::post('add',['as'=>'admin.tintuc.postAdd','uses'=>'TinTucController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.tintuc.getDelete','uses'=>'TinTucController@getDelete']);
	});
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('loaitin/{TheLoai_ID}','AjaxController@getLoaiTin');
	});
	Route::group(['prefix'=>'comment'],function(){
		Route::get('delete/{id}',['as'=>'admin.comment.getDelete','uses'=>'CommentController@getDelete']);
	});
	Route::group(['prefix'=>'slide'],function(){
		Route::get('list',['as'=>'admin.slide.getList','uses'=>'SlideController@getList']);
		Route::get('edit/{id}',['as'=>'admin.slide.getEdit','uses'=>'SlideController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.slide.postEdit','uses'=>'SlideController@postEdit']);
		Route::get('add',['as'=>'admin.slide.getAdd','uses'=>'SlideController@getAdd']);
		Route::post('add',['as'=>'admin.slide.postAdd','uses'=>'SlideController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.slide.getDelete','uses'=>'SlideController@getDelete']);
	});
	Route::group(['prefix'=>'user'],function(){
		Route::get('list',['as'=>'admin.user.getList','uses'=>'UserController@getList']);
		Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']);
		Route::get('add',['as'=>'admin.user.getAdd','uses'=>'UserController@getAdd']);
		Route::post('add',['as'=>'admin.user.postAdd','uses'=>'UserController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.user.getDelete','uses'=>'UserController@getDelete']);
	});
});
Route::get('homepage','PageController@HomePage');
Route::get('contact','PageController@Contact');
Route::get('loaitin/{id}/{alias}.html','PageController@Loaitin');
Route::get('tintuc/{id}/{alias}.html','PageController@Tintuc');
Route::get('login','PageController@getLogin');
Route::post('login','PageController@postLogin');
Route::get('logout','PageController@getLogout');
Route::post('nguoidung','PageController@postnguoidung');
Route::get('nguoidung/{id}','PageController@getNguoidung')->middleware('UserLogin');
Route::post('comment/{id}','CommentController@postComment');
Route::get('register','PageController@getRegister');
Route::post('register','PageController@postRegister');