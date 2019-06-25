<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Slide;
use App\Type;
use App\News;
use Auth;

class PagesController extends Controller
{
    //Khởi tạo view share
	function __construct(){
		$theloai = Category::all();
		$slide = Slide::all();
		view()->share('theloai', $theloai);
		view()->share('slide', $slide);
	}

    public function getTrangChu()
    {
    	return view('pages.trangchu');
    }

    public function getLienHe()
    {
    	return view('pages.lienhe');
    }

    function getLoaiTin($id)
    {
        $loaitin = Type::findOrFail($id);
        $tintuc = News::where('idLoaiTin', $id)->paginate(5);
        return view('pages.types', compact('loaitin', 'tintuc'));
    }
    function getTinTuc($id)
    {
        $tintuc = News::findOrFail($id);
        $tinnoibat = News::where('NoiBat', 1)->take(4)->get();
        $tinlienquan = News::where('idLoaiTin', $tintuc->idLoaiTin)->take(4)->get();

        return view('pages.tintuc', compact('tintuc', 'tinnoibat', 'tinlienquan'));
    }

    public function getTimKiem(Request $request)
    {
        $tukhoa = $request->timkiem;
        $data = News::where('TieuDe', 'like', '%'.$tukhoa.'%')->orWhere('TomTat', 'like', '%'.$tukhoa.'%')->orWhere('NoiDung', 'like', '%'.$tukhoa.'%')->paginate(10);
        $data->setPath('timkiem?');
        return view('pages.timkiem', compact('data', 'tukhoa'));
    }
}
