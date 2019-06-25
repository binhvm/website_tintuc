<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\TypeRequest;
use App\Type;
use App\Category;

class TypeController extends Controller
{
    //Lấy danh sách
    public function index()
    {
    	$types = Type::all();
    	return view('admin.types.list', compact('types'));
    }

    //Hiển thị view thêm loại tin
    public function create()
    {
        $categories = Category::all();
    	return view('admin.types.add', compact('categories'));
    }

    //Xử lý thêm loại tin
    public function store(TypeRequest $request)
    {
        $input = $request->only('idTheLoai', 'Ten');
        $input['TenKhongDau'] = changeTitle($request->Ten);
        $types = Type::create($input);

        return redirect('admin/types/add')->with('notification', 'Thêm mới loại tin thành công.');
    }

    //Hiển thị view sửa tin tức
    public function edit($id)
    {
        $categories = Category::all();
        $types = Type::findOrFail($id);
        return view('admin.types.edit', compact('types', 'categories'));
    }

    //Xử lý sửa tin tức
    public function update(TypeRequest $request, $id)
    {
        $input = $request->only('idTheLoai', 'Ten');
        $input['TenKhongDau'] = changeTitle($request->Ten);
        $types = Type::findOrFail($id);
        $types->update($input);

        return redirect('admin/types/edit/'.$id)->with('notification', 'Sửa loại tin thành công.');
    }

    //Hiển thị view xóa tin tức
    public function delete($id)
    {
        $categories = Category::all();
        $types = Type::findOrFail($id);
        return view('admin.types.delete', compact('types', 'categories'));
    }

    //Xử lý xóa tin tức
    public function destroy($id)
    {
        $types = Type::findOrFail($id);
        $types->delete();

        return redirect('admin/types/list')->with('notification', 'Xóa loại tin thành công.');
    }
}
