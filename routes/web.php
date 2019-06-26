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
    Route::group(['prefix' => 'categories', 'middleware' => 'superAdmin'], function () {
        Route::get('list', 'CategoryController@index');

        Route::get('add', 'CategoryController@create');
        Route::post('add', 'CategoryController@store');

        Route::get('edit/{id}', 'CategoryController@edit');
        Route::post('edit/{id}', 'CategoryController@update');

        Route::get('delete/{id}', 'CategoryController@delete');
        Route::post('delete/{id}', 'CategoryController@destroy');
    });

    //Resource loại tin
    Route::group(['prefix' => 'types', 'middleware' => 'superAdmin'], function () {
        Route::get('list', 'TypeController@index');

        Route::get('add', 'TypeController@create');
        Route::post('add', 'TypeController@store');

        Route::get('edit/{id}', 'TypeController@edit');
        Route::post('edit/{id}', 'TypeController@update');

        Route::get('delete/{id}', 'TypeController@delete');
        Route::post('delete/{id}', 'TypeController@destroy');
    });

    //Resource tin tức
    Route::group(['prefix' => 'news'], function () {
        Route::get('list', 'NewsController@index');

        Route::get('pheduyet', 'NewsController@getPheDuyet');
        Route::get('pheduyet/{id}', 'NewsController@postPheDuyet');

        Route::get('add', 'NewsController@create');
        Route::post('add', 'NewsController@store');

        Route::get('edit/{id}', 'NewsController@edit');
        Route::post('edit/{id}', 'NewsController@update');

        Route::get('delete/{id}', 'NewsController@delete');
        Route::post('delete/{id}', 'NewsController@destroy');
    });

    //Quản lý comment
    Route::group(['prefix' => 'comment'], function () {
        Route::get('xoa/{id}/{idTinTuc}', 'CommentController@getXoa');
    });

    //Resource slide
    Route::group(['prefix' => 'slide', 'middleware' => 'superAdmin'], function () {
        Route::get('list', 'SlideController@index');

        Route::get('add', 'SlideController@create');
        Route::post('add', 'SlideController@store');

        Route::get('edit/{id}', 'SlideController@edit');
        Route::post('edit/{id}', 'SlideController@update');

        Route::get('delete/{id}', 'SlideController@delete');
        Route::post('delete/{id}', 'SlideController@destroy');
    });

    //Resource user
    Route::group(['prefix' => 'user', 'middleware' => 'superAdmin'], function () {
        Route::get('list', 'UserController@index');

        Route::get('add', 'UserController@create');
        Route::post('add', 'UserController@store');

        Route::get('edit/{id}', 'UserController@edit');
        Route::post('edit/{id}', 'UserController@update');
    });

    //Ajax
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('types/{idTheLoai}', 'AjaxController@getLoaiTin');
    });
});

//Home pages, infor pages
Route::get('homepage', 'PagesController@Homepage');
Route::get('contact', 'PagesController@getContact');
Route::get('types/{id}/{TenKhongDau}', 'PagesController@getType');
Route::get('news/{id}/{TenKhongDau}', 'PagesController@getNews');

//Login, logout admin
Route::get('admin/dangnhap', 'UserController@getDangNhapAdmin');
Route::post('admin/dangnhap', 'UserController@postDangNhapAdmin');
Route::get('admin/dangxuat', 'UserController@getDangXuatAdmin');

//Login, logout users
Route::get('login', 'UserController@getLogin');
Route::post('login', 'UserController@postLogin');
Route::get('logout', 'UserController@getLogout');

//Register users
Route::get('register', 'UserController@getRegister');
Route::post('register', 'UserController@postRegister');

//Detail users
Route::get('account/{id}', 'UserController@getAccount');
Route::post('account/{id}', 'UserController@postAccount');

//Search
Route::get('search', 'PagesController@getSearch');

//Comment
Route::post('comment', 'CommentController@postComment');
Route::get('list-comment/{id}', 'CommentController@getComment');