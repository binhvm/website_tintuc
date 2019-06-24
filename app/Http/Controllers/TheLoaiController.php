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
        $input = $request->only('Ten');
        $input['TenKhongDau'] = changeTitle($request->Ten);
        $theloai = TheLoai::create($input);

    	return redirect()->back()->with('thongbao', 'Thêm mới thể loại thành công.');
    }

    public function getSua($id)
    {
    	$theloai = TheLoai::findOrFail($id);
	    
        return view('admin.theloai.sua', compact('theloai'));
    }

    public function postSua(TheLoaiRequest $request, $id)
    {
        $input = $request->only('Ten');
        $input['TenKhongDau'] = changeTitle($request->Ten);
        $theloai = TheLoai::findOrFail($id);
        $theloai->update($input);

        return redirect('admin/theloai/sua/'.$id)->with('thongbao', 'Sửa thể loại thành công.');
    }

    public function getXoa($id)
    {
    	$theloai = TheLoai::findOrFail($id);
	    
        return view('admin.theloai.xoa', compact('theloai'));
    }

    public function postXoa($id)
    {
    	$theloai = TheLoai::findOrFail($id);
        $theloai->delete();
        
        return redirect('admin/theloai/danhsach')->with('thongbao', 'Xóa thể loại thành công.');
    }
}