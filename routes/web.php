<?php

use App\Category;
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

// Route::resource('admin/theloai', 'CategoryController');

//Route group admin
Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {

    //Resource thể loại
    Route::group(['prefix' => 'theloai', 'middleware' => 'superAdmin'], function () {
        Route::get('danhsach', 'CategoryController@getDanhSach');

        Route::get('them', 'CategoryController@getThem');
        Route::post('them', 'CategoryController@postThem');

        Route::get('sua/{id}', 'CategoryController@getSua');
        Route::post('sua/{id}', 'CategoryController@postSua');

        Route::get('xoa/{id}', 'CategoryController@getXoa');
        Route::post('xoa/{id}', 'CategoryController@postXoa');
    });

    //Resource loại tin
    Route::group(['prefix' => 'loaitin', 'middleware' => 'superAdmin'], function () {
        Route::get('danhsach', 'TypeController@getDanhSach');

        Route::get('them', 'TypeController@getThem');
        Route::post('them', 'TypeController@postThem');

        Route::get('sua/{id}', 'TypeController@getSua');
        Route::post('sua/{id}', 'TypeController@postSua');

        Route::get('xoa/{id}', 'TypeController@getXoa');
        Route::post('xoa/{id}', 'TypeController@postXoa');
    });

    //Resource tin tức
    Route::group(['prefix' => 'tintuc'], function () {
        Route::get('danhsach', 'NewsController@getDanhSach');

        Route::get('pheduyet', 'NewsController@getPheDuyet');
        Route::get('pheduyet/{id}', 'NewsController@postPheDuyet');

        Route::get('them', 'NewsController@getThem');
        Route::post('them', 'NewsController@postThem');

        Route::get('sua/{id}', 'NewsController@getSua');
        Route::post('sua/{id}', 'NewsController@postSua');

        Route::get('xoa/{id}', 'NewsController@getXoa');
        Route::post('xoa/{id}', 'NewsController@postXoa');
    });

    //Quản lý comment
    Route::group(['prefix' => 'comment'], function () {
        Route::get('xoa/{id}/{idTinTuc}', 'CommentController@getXoa');
    });

    //Resource slide
    Route::group(['prefix' => 'slide', 'middleware' => 'superAdmin'], function () {
        Route::get('danhsach', 'SlideController@getDanhSach');

        Route::get('them', 'SlideController@getThem');
        Route::post('them', 'SlideController@postThem');

        Route::get('sua/{id}', 'SlideController@getSua');
        Route::post('sua/{id}', 'SlideController@postSua');

        Route::get('xoa/{id}', 'SlideController@getXoa');
        Route::post('xoa/{id}', 'SlideController@postXoa');
    });

    //Resource user
    Route::group(['prefix' => 'user', 'middleware' => 'superAdmin'], function () {
        Route::get('danhsach', 'UserController@getDanhSach');

        Route::get('them', 'UserController@getThem');
        Route::post('them', 'UserController@postThem');

        Route::get('sua/{id}', 'UserController@getSua');
        Route::post('sua/{id}', 'UserController@postSua');
    });

    //Ajax
    Route::group(['prefix' => 'ajax'], function () {
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

//Comment
Route::post('comment', 'CommentController@postComment');
Route::get('list-comment/{id}', 'CommentController@getComment');