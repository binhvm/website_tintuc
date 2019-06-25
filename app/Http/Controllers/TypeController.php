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
    public function getDanhSach()
    {
    	$loaitin = Type::all();
    	return view('admin.loaitin.danhsach', compact('loaitin'));
    }

    //Hiển thị view thêm loại tin
    public function getThem()
    {
        $theloai = Category::all();
    	return view('admin.loaitin.them', compact('theloai'));
    }

    //Xử lý thêm loại tin
    public function postThem(TypeRequest $request)
    {
        $input = $request->only('idTheLoai', 'Ten');
        $input['TenKhongDau'] = changeTitle($request->Ten);
        $loaitin = Type::create($input);

        return redirect('admin/loaitin/them')->with('thongbao', 'Thêm mới loại tin thành công.');
    }

    //Hiển thị view sửa tin tức
    public function getSua($id)
    {
        $theloai = Category::all();
        $loaitin = Type::findOrFail($id);
        return view('admin.loaitin.sua', compact('loaitin', 'theloai'));
    }

    //Xử lý sửa tin tức
    public function postSua(TypeRequest $request, $id)
    {
        $input = $request->only('Category', 'Ten');
        $input['TenKhongDau'] = changeTitle($request->Ten);
        $loaitin = Type::findOrFail($id);
        $loaitin->update($input);

        return redirect('admin/loaitin/sua/'.$id)->with('thongbao', 'Sửa loại tin thành công.');
    }

    //Hiển thị view xóa tin tức
    public function getXoa($id)
    {
        $theloai = Category::all();
        $loaitin = Type::findOrFail($id);
        return view('admin.loaitin.xoa', compact('loaitin', 'theloai'));
    }

    //Xử lý xóa tin tức
    public function postXoa($id)
    {
        $loaitin = Type::findOrFail($id);
        $loaitin->delete();

        return redirect('admin/loaitin/danhsach')->with('thongbao', 'Xóa loại tin thành công.');
    }
}
