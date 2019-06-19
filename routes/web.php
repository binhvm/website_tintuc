<?php
use App\TheLoai;
use App\Http\Middleware\AdminLoginMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('admin/theloai', 'TheLoaiController');

//Route group admin
Route::group(['prefix'=>'admin', 'middleware' => 'adminLogin'], function(){
	//Resource thể loại
	Route::group(['prefix'=>'theloai'], function(){
		Route::get('danhsach', 'TheLoaiController@getDanhSach');

		Route::get('them', 'TheLoaiController@getThem');
		Route::post('them', 'TheLoaiController@postThem');

		Route::get('sua/{id}', 'TheLoaiController@getSua');
		Route::post('sua/{id}', 'TheLoaiController@postSua');

		Route::get('xoa/{id}', 'TheLoaiController@getXoa');
		Route::post('xoa/{id}', 'TheLoaiController@postXoa');
	});

	//Resource loại tin
	Route::group(['prefix'=>'loaitin'], function(){
		Route::get('danhsach', 'LoaiTinController@getDanhSach');

		Route::get('them', 'LoaiTinController@getThem');
		Route::post('them', 'LoaiTinController@postThem');

		Route::get('sua/{id}', 'LoaiTinController@getSua');
		Route::post('sua/{id}', 'LoaiTinController@postSua');

		Route::get('xoa/{id}', 'LoaiTinController@getXoa');
		Route::post('xoa/{id}', 'LoaiTinController@postXoa');
	});

	//Resource tin tức
	Route::group(['prefix'=>'tintuc'], function(){
		Route::get('danhsach', 'TinTucController@getDanhSach');

		Route::get('them', 'TinTucController@getThem');
		Route::post('them', 'TinTucController@postThem');

		Route::get('sua/{id}', 'TinTucController@getSua');
		Route::post('sua/{id}', 'TinTucController@postSua');

		Route::get('xoa/{id}', 'TinTucController@getXoa');
		Route::post('xoa/{id}', 'TinTucController@postXoa');
	});

	//Comment
	Route::group(['prefix'=>'comment'], function(){
		Route::get('xoa/{id}/{idTinTuc}', 'CommentController@getXoa');
	});

	//Resource slide
	Route::group(['prefix'=>'slide'], function(){
		Route::get('danhsach', 'SlideController@getDanhSach');

		Route::get('them', 'SlideController@getThem');
		Route::post('them', 'SlideController@postThem');

		Route::get('sua/{id}', 'SlideController@getSua');
		Route::post('sua/{id}', 'SlideController@postSua');

		Route::get('xoa/{id}', 'SlideController@getXoa');
		Route::post('xoa/{id}', 'SlideController@postXoa');
	});

	//Resource user
	Route::group(['prefix'=>'user'], function(){
		Route::get('danhsach', 'UserController@getDanhSach');

		Route::get('them', 'UserController@getThem');
		Route::post('them', 'UserController@postThem');

		Route::get('sua/{id}', 'UserController@getSua');
		Route::post('sua/{id}', 'UserController@postSua');

		Route::get('xoa/{id}', 'UserController@getXoa');
		Route::post('xoa/{id}', 'UserController@postXoa');
	});

	//Ajax
	Route::group(['prefix'=>'ajax'], function(){
		Route::get('loaitin/{idTheLoai}', 'AjaxController@getLoaiTin');
	});
});

//Home pages, infor pages
Route::get('trangchu', 'PagesController@getTrangChu');
Route::get('lienhe', 'PagesController@getLienHe');
Route::get('loaitin/{id}/{TenKhongDau}', 'PagesController@getLoaiTin');
Route::get('tintuc/{id}/{TenKhongDau}', 'PagesController@getTinTuc');


//Login, logout admin
Route::get('admin/dangnhap', 'UserController@getDangNhapAdmin');
Route::post('admin/dangnhap', 'UserController@postDangNhapAdmin'); 
Route::get('admin/dangxuat', 'UserController@getDangXuatAdmin');

//Login, logout users
Route::get('dangnhap', 'UserController@getDangNhap');
Route::post('dangnhap', 'UserController@postDangNhap');
Route::get('dangxuat', 'UserController@getDangXuat');

//Register users
Route::get('dangky', 'UserController@getDangKy');
Route::post('dangky', 'UserController@postDangKy');

//Detail users
Route::get('thongtintk/{id}', 'UserController@getSuaTK');
Route::post('thongtintk/{id}', 'UserController@postSuaTK');

//Search
Route::get('timkiem', 'PagesController@getTimKiem');