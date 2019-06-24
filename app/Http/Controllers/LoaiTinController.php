<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\LoaiTinRequest;
use App\LoaiTin;
use App\TheLoai;

class LoaiTinController extends Controller
{
    //Lấy danh sách
    public function getDanhSach()
    {
    	$loaitin = LoaiTin::all();
    	return view('admin.loaitin.danhsach', compact('loaitin'));
    }

    //Hiển thị view thêm loại tin
    public function getThem()
    {
        $theloai = TheLoai::all();
    	return view('admin.loaitin.them', compact('theloai'));
    }

    //Xử lý thêm loại tin
    public function postThem(LoaiTinRequest $request)
    {
        $input = $request->only('idTheLoai', 'Ten');
        $input['TenKhongDau'] = changeTitle($request->Ten);
        $loaitin = LoaiTin::create($input);

        return redirect('admin/loaitin/them')->with('thongbao', 'Thêm mới loại tin thành công.');
    }

    //Hiển thị view sửa tin tức
    public function getSua($id)
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::findOrFail($id);
        return view('admin.loaitin.sua', compact('loaitin', 'theloai'));
    }

    //Xử lý sửa tin tức
    public function postSua(LoaiTinRequest $request, $id)
    {
        $input = $request->only('TheLoai', 'Ten');
        $input['TenKhongDau'] = changeTitle($request->Ten);
        $loaitin = LoaiTin::findOrFail($id);
        $loaitin->update($input);

        return redirect('admin/loaitin/sua/'.$id)->with('thongbao', 'Sửa loại tin thành công.');
    }

    //Hiển thị view xóa tin tức
    public function getXoa($id)
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::findOrFail($id);
        return view('admin.loaitin.xoa', compact('loaitin', 'theloai'));
    }

    //Xử lý xóa tin tức
    public function postXoa($id)
    {
        $loaitin = LoaiTin::findOrFail($id);
        $loaitin->delete();

        return redirect('admin/loaitin/danhsach')->with('thongbao', 'Xóa loại tin thành công.');
    }
}
