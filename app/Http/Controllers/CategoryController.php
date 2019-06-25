<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\CategoryRequest;
use App\Category;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
    	
        return view('admin.categories.list', compact('categories'));
    }

    public function create()
    {
    	return view('admin.categories.add');
    }
    public function store(CategoryRequest $request)
    {
        $input = $request->only('Ten');
        $input['TenKhongDau'] = changeTitle($request->Ten);
        $categories = Category::create($input);

    	return redirect()->back()->with('notification', 'Thêm mới thể loại thành công.');
    }

    public function edit($id)
    {
    	$categories = Category::findOrFail($id);
	    
        return view('admin.categories.edit', compact('categories'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $input = $request->only('Ten');
        $input['TenKhongDau'] = changeTitle($request->Ten);
        $categories = Category::findOrFail($id);
        $categories->update($input);

        return redirect('admin/categories/edit/'.$id)->with('notification', 'Sửa thể loại thành công.');
    }

    public function delete($id)
    {
    	$categories = Category::findOrFail($id);
	    
        return view('admin.categories.delete', compact('categories'));
    }

    public function destroy($id)
    {
    	$categories = Category::findOrFail($id);
        $categories->delete();
        
        return redirect('admin/categories/list')->with('notification', 'Xóa thể loại thành công.');
    }
}