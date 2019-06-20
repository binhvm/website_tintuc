<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\TinTucRequest;
use Illuminate\Support\Facades\Auth;
use App\LoaiTin;
use App\TheLoai;
use App\TinTuc;
use App\Comment;

class TinTucController extends Controller
{
    //
    public function getDanhSach()
    {
    	$tintuc = TinTuc::all();
    	return view('admin.tintuc.danhsach',compact('tintuc'));
    }

    public function getThem()
    {
    	$theloai = TheLoai::all();
    	$loaitin = LoaiTin::all();
    	return view('admin.tintuc.them', compact('theloai', 'loaitin'));
    }

    public function postThem(TinTucRequest $request)
    {
    	$tintuc = new TinTuc;
    	$tintuc->TieuDe = $request->TieuDe;
    	$tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
    	$tintuc->TomTat = $request->TomTat;
    	$tintuc->NoiDung = $request->NoiDung;
    	$tintuc->idLoaiTin = $request->LoaiTin;
    	$tintuc->SoLuotXem = 0;
    	$tintuc->NoiBat = $request->NoiBat;
    	
    	if ($request->hasFile('Hinh')) {
    		$file = $request->file('Hinh');
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
    			return redirect('admin/tintuc/them')->with('thongbao', 'Ảnh phải có định dạng: jpg, png hoặc jpeg.');
    		}
    		$name = $file->getClientOriginalName();
    		$Hinh = str_random(5)."_". $name;
    		while(file_exists("upload/tintuc/".$Hinh)){
    			$Hinh = str_random(5)."_". $name;
    		}
    		$file->move("upload/tintuc", $Hinh);
    		$tintuc->Hinh = $Hinh;
    	}else{
    		$tintuc->Hinh = "";
    	}
    	$tintuc->save();

    	return redirect()->back()->with('thongbao', 'Thêm tin tức thành công.');
    }

    public function getSua($id)
    {
    	$theloai = TheLoai::all();
    	$loaitin = LoaiTin::all();
    	$tintuc = TinTuc::find($id);

    	return view('admin.tintuc.sua', compact('theloai', 'loaitin', 'tintuc'));
    }

    public function postSua(TinTucRequest $request, $id)
    {
    	$tintuc = TinTuc::find($id);
    	$tintuc->TieuDe = $request->TieuDe;
    	$tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
    	$tintuc->TomTat = $request->TomTat;
    	$tintuc->NoiDung = $request->NoiDung;
    	$tintuc->idLoaiTin = $request->LoaiTin;
    	$tintuc->NoiBat = $request->NoiBat;
    	
    	if ($request->hasFile('Hinh')) {
    		$file = $request->file('Hinh');
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
    			return redirect('admin/tintuc/them')->with('thongbao', 'Ảnh phải có định dạng: jpg, png hoặc jpeg.');
    		}
    		$name = $file->getClientOriginalName();
    		$Hinh = str_random(5)."_". $name;
    		while(file_exists("upload/tintuc/".$Hinh)){
    			$Hinh = str_random(5)."_". $name;
    		}
    		$file->move("upload/tintuc", $Hinh);
    		unlink("upload/tintuc/".$tintuc->Hinh);
    		$tintuc->Hinh = $Hinh;
    	}
    	$tintuc->save();

    	return redirect()->back()->with('thongbao', 'Sửa tin tức thành công.');
    }

    public function getXoa($id)
    {
    	$theloai = TheLoai::all();
    	$loaitin = LoaiTin::all();
    	$tintuc = TinTuc::find($id);

    	return view('admin.tintuc.xoa', compact('theloai', 'loaitin', 'tintuc'));
    }

    public function postXoa($id)
    {
    	$tintuc = TinTuc::find($id);
    	$tintuc->delete();

    	return redirect('admin/tintuc/danhsach')->with('thongbao', 'Xóa tin tức thành công.');
    }
}