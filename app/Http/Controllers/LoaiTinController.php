<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\LoaiTinRequest;
use App\LoaiTin;
use App\TheLoai;

class LoaiTinController extends Controller
{
    //
    public function getDanhSach()
    {
    	$loaitin = LoaiTin::all();
    	return view('admin.loaitin.danhsach', compact('loaitin'));
    }

    public function getThem()
    {
        $theloai = TheLoai::all();
    	return view('admin.loaitin.them', compact('theloai'));
    }

    public function postThem(LoaiTinRequest $request)
    {
        $input = $request->only('idTheLoai', 'Ten');
        $input['TenKhongDau'] = changeTitle($request->Ten);
        $loaitin = LoaiTin::create($input);

        return redirect('admin/loaitin/them')->with('thongbao', 'Thêm mới loại tin thành công.');
    }

    public function getSua($id)
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::find($id);
        return view('admin.loaitin.sua', compact('loaitin', 'theloai'));
    }

    public function postSua(LoaiTinRequest $request, $id)
    {
        $loaitin = LoaiTin::find($id);
        $loaitin->idTheLoai = $request->TheLoai;
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = changeTitle($request->Ten);
        $loaitin->save();

        return redirect('admin/loaitin/sua/'.$id)->with('thongbao', 'Sửa loại tin thành công.');
    }

    public function getXoa($id)
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::find($id);
        return view('admin.loaitin.xoa', compact('loaitin', 'theloai'));
    }

    public function postXoa($id)
    {
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();

        return redirect('admin/loaitin/danhsach')->with('thongbao', 'Xóa loại tin thành công.');
    }
}
