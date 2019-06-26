<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Http\Requests\SlideRequest;

class SlideController extends Controller
{
    //
    public function index()
    {
    	$slide = Slide::all();
    	return view('admin.slide.list', compact('slide'));
    }

    public function create()
    {
    	return view('admin.slide.add');
    }

    public function store(SlideRequest $request)
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
    			return back()->with('notification', 'Ảnh phải có định dạng: jpg, png hoặc jpeg.');
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

    	return back()->with('notification', 'Thêm mới slide thành công.');
    }

    public function edit($id)
    {
    	$slide = Slide::findOrFail($id);

    	return view('admin.slide.edit', compact('slide'));
    }

    public function update(SlideRequest $request, $id)
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
    			return back()->with('notification', 'Ảnh phải có định dạng: jpg, png hoặc jpeg.');
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

    	return back()->with('notification', 'Sửa thông tin slide thành công.');
    }

    public function delete($id)
    {
    	$slide = Slide::findOrFail($id);

    	return view('admin.slide.delete', compact('slide'));
    }

    public function destroy($id)
    {
    	$slide = Slide::findOrFail($id);
    	$slide->delete();

    	return redirect('admin/slide/list')->with('notification', 'Xóa thông tin slide thành công.');
    }
}
