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
		$categories = Category::all();
		$slide = Slide::all();
		view()->share('categories', $categories);
		view()->share('slide', $slide);
	}

    public function Homepage()
    {
    	return view('pages.homepage');
    }

    public function getContact()
    {
    	return view('pages.contact');
    }

    function getType($id)
    {
        $types = Type::findOrFail($id);
        $news = News::where('idLoaiTin', $id)->paginate(5);
        return view('pages.type', compact('types', 'news'));
    }
    function getNews($id)
    {
        $news = News::findOrFail($id);
        $hotnews = News::where('NoiBat', 1)->take(4)->get();
        $tinlienquan = News::where('idLoaiTin', $news->idLoaiTin)->take(4)->get();

        return view('pages.news', compact('news', 'hotnews', 'tinlienquan'));
    }

    public function getSearch(Request $request)
    {
        $key = $request->search;
        $data = News::where('TieuDe', 'like', '%'.$key.'%')->orWhere('TomTat', 'like', '%'.$key.'%')->orWhere('NoiDung', 'like', '%'.$key.'%')->paginate(10);
        $data->setPath('search?');
        return view('pages.search', compact('data', 'key'));
    }
}
