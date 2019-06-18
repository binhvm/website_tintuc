<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\TheLoaiRequest;
use App\TheLoai;

class TheLoaiController extends Controller
{
    //
    public function getDanhSach()
    {
    	$theloai = TheLoai::all();
    	
        return view('admin.theloai.danhsach', compact('theloai'));
    }

    public function getThem()
    {
    	return view('admin.theloai.them');
    }
    public function postThem(TheLoaiRequest $request)
    {
    	$theloai = new TheLoai;
    	$theloai->Ten = $request->Ten;
    	$theloai->TenKhongDau = changeTitle($request->Ten);
    	$theloai->save();

    	return redirect()->back()->with('thongbao', 'Thêm mới thể loại thành công.');
    }

    public function getSua($id)
    {
    	$theloai = TheLoai::find($id);
	    
        return view('admin.theloai.sua', compact('theloai'));
    }

    public function postSua(TheLoaiRequest $request, $id)
    {
        $theloai = TheLoai::find($id);
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = changeTitle($request->Ten);
        $theloai->save();

        return redirect('admin/theloai/sua/'.$id)->with('thongbao', 'Sửa thể loại thành công.');
    }

    public function getXoa($id)
    {
    	$theloai = TheLoai::find($id);
	    
        return view('admin.theloai.xoa', compact('theloai'));
    }

    public function postXoa($id)
    {
    	$theloai = TheLoai::find($id);
        $theloai->delete();
        
        return redirect('admin/theloai/danhsach')->with('thongbao', 'Xóa thể loại thành công.');
    }
}