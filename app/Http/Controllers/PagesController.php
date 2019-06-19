<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
use Auth;

class PagesController extends Controller
{
    //Khởi tạo view share
	function __construct(){
		$theloai = TheLoai::all();
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
        $loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin', $id)->paginate(5);
        return view('pages.loaitin', compact('loaitin', 'tintuc'));
    }
    function getTinTuc($id)
    {
        $tintuc = TinTuc::find($id);
        $tinnoibat = TinTuc::where('NoiBat', 1)->take(4)->get();
        $tinlienquan = TinTuc::where('idLoaiTin', $tintuc->idLoaiTin)->take(4)->get();

        return view('pages.tintuc', compact('tintuc', 'tinnoibat', 'tinlienquan'));
    }

    public function getTimKiem(Request $request)
    {
        $tukhoa = $request->timkiem;
        $data = TinTuc::where('TieuDe', 'like', '%'.$tukhoa.'%')->orWhere('TomTat', 'like', '%'.$tukhoa.'%')->orWhere('NoiDung', 'like', '%'.$tukhoa.'%')->paginate(10);
        $data->setPath('timkiem?');
        return view('pages.timkiem', compact('data', 'tukhoa'));
    }
}
