<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\Auth;
use App\Type;
use App\Category;
use App\News;
use App\Comment;

class NewsController extends Controller
{
    //
    public function index()
    {
    	$news = News::all();
    	return view('admin.news.list',compact('news'));
    }

    public function getPheDuyet()
    {
        $news = News::all();
        return view('admin.news.pheduyet',compact('news'));
    }

    public function postPheDuyet($id)
    {
        $news = News::findOrFail($id);
        $news->PheDuyet = 1;
        $news->save();

        return redirect()->back()->with('notification', 'Phê duyệt thành công.');
    }

    public function create()
    {
    	$categories = Category::all();
    	$types = Type::all();
    	return view('admin.news.add', compact('categories', 'types'));
    }

    public function store(NewsRequest $request)
    {
        $input = $request->only('TieuDe', 'TomTat', 'NoiDung', 'Hinh', 'NoiBat', 'idLoaiTin');
        $input['TieuDeKhongDau'] = changeTitle($request->TieuDe);
        $input['SoLuotXem'] = 0;
        $input['PheDuyet'] = 0;
    	
    	if ($request->hasFile('Hinh')) {
    		$file = $request->file('Hinh');
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
    			return back()->with('notification', 'Ảnh phải có định dạng: jpg, png hoặc jpeg.');
    		}
    		$name = $file->getClientOriginalName();
    		$Hinh = str_random(5)."_". $name;
    		while(file_exists("upload/tintuc/".$Hinh)){
    			$Hinh = str_random(5)."_". $name;
    		}
    		$file->move("upload/tintuc", $Hinh);
    		$input['Hinh'] = $Hinh;
    	}else{
    		$input['Hinh'] = "";
    	}
    	$news = News::create($input);

    	return redirect()->back()->with('notification', 'Thêm tin tức thành công, đang đợi phê duyệt.');
    }

    public function edit($id)
    {
    	$categories = Category::all();
    	$types = Type::all();
    	$news = News::findOrFail($id);

    	return view('admin.news.edit', compact('categories', 'types', 'news'));
    }

    public function update(Request $request, $id)
    {
    	$news = News::findOrFail($id);
    	$news->TieuDe = $request->TieuDe;
    	$news->TieuDeKhongDau = changeTitle($request->TieuDe);
    	$news->TomTat = $request->TomTat;
    	$news->NoiDung = $request->NoiDung;
    	$news->idLoaiTin = $request->LoaiTin;
    	$news->NoiBat = $request->NoiBat;
    	
    	if ($request->hasFile('Hinh')) {
    		$file = $request->file('Hinh');
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
    			return back()->with('notification', 'Ảnh phải có định dạng: jpg, png hoặc jpeg.');
    		}
    		$name = $file->getClientOriginalName();
    		$Hinh = str_random(5)."_". $name;
    		while(file_exists("upload/tintuc/".$Hinh)){
    			$Hinh = str_random(5)."_". $name;
    		}
    		$file->move("upload/tintuc", $Hinh);
    		unlink("upload/tintuc/".$news->Hinh);
    		$news->Hinh = $Hinh;
    	}
    	$news->save();

    	return back()->with('notification', 'Sửa tin tức thành công.');
    }

    public function delete($id)
    {
    	$categories = Category::all();
    	$types = Type::all();
    	$news = News::findOrFail($id);

    	return view('admin.news.delete', compact('categories', 'types', 'news'));
    }

    public function destroy($id)
    {
    	$news = News::findOrFail($id);
    	$news->delete();

    	return redirect('admin/news/list')->with('notification', 'Xóa tin tức thành công.');
    }
}
