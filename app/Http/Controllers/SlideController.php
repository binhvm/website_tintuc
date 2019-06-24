<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Http\Requests\SlideRequest;

class SlideController extends Controller
{
    //
    public function getDanhSach()
    {
    	$slide = Slide::all();
    	return view('admin.slide.danhsach', compact('slide'));
    }

    public function getThem()
    {
    	return view('admin.slide.them');
    }

    public function postThem(SlideRequest $request)
    {
    	$slide = new Slide;
    	$slide->Ten = $request->Ten;
    	$slide->NoiDung = $request->NoiDung;
    	if ($request->has('link')) {
    		$slide->link = $request->link;
    	}

    	if ($request->hasFile('Hinh')) {
    		$file = $request->file('Hinh');
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
    			return redirect('admin/slide/them')->with('thongbao', 'Ảnh phải có định dạng: jpg, png hoặc jpeg.');
    		}
    		$name = $file->getClientOriginalName();
    		$Hinh = str_random(5)."_". $name;
    		while(file_exists("upload/slide/".$Hinh)){
    			$Hinh = str_random(5)."_". $name;
    		}
    		$file->move("upload/slide", $Hinh);
    		$slide->Hinh = $Hinh;
    	}else{
    		$slide->Hinh = "";
    	}
    	$slide->save();

    	return redirect('admin/slide/them')->with('thongbao', 'Thêm mới slide thành công.');
    }

    public function getSua($id)
    {
    	$slide = Slide::findOrFail($id);

    	return view('admin.slide.sua', compact('slide'));
    }

    public function postSua(SlideRequest $request, $id)
    {
    	$slide = Slide::findOrFail($id);
    	$slide->Ten = $request->Ten;
    	$slide->NoiDung = $request->NoiDung;
    	if ($request->has('link')) {
    		$slide->link = $request->link;
    	}
    	if ($request->hasFile('Hinh')) {
    		$file = $request->file('Hinh');
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
    			return redirect('admin/slide/them')->with('thongbao', 'Ảnh phải có định dạng: jpg, png hoặc jpeg.');
    		}
    		$name = $file->getClientOriginalName();
    		$Hinh = str_random(5)."_". $name;
    		while(file_exists("upload/slide/".$Hinh)){
    			$Hinh = str_random(5)."_". $name;
    		}
    		unlink("upload/slide/".$slide->Hinh);
    		$file->move("upload/slide", $Hinh);
    		$slide->Hinh = $Hinh;
    	}
    	$slide->save();

    	return redirect('admin/slide/sua/'.$id)->with('thongbao', 'Sửa thông tin slide thành công.');
    }

    public function getXoa($id)
    {
    	$slide = Slide::findOrFail($id);

    	return view('admin.slide.xoa', compact('slide'));
    }

    public function postXoa($id)
    {
    	$slide = Slide::findOrFail($id);
    	$slide->delete();

    	return redirect('admin/slide/danhsach')->with('thongbao', 'Xóa thông tin slide thành công.');
    }
}
