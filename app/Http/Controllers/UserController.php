<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\User;

class UserController extends Controller
{
    //
    public function getDanhSach()
    {
    	$user = User::all();

    	return view('admin.user.danhsach', compact('user'));
    }

    public function getThem()
    {
    	return view('admin.user.them');
    }

    public function postThem(UserRequest $request)
    {
    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->quyen = $request->quyen;
    	$user->password = bcrypt($request->password);
    	$user->save();

    	return redirect()->back()->with('thongbao', 'Thêm mới người dùng thành công.');
    }

    public function getSua($id)
    {
    	$user = User::find($id);
    	return view('admin.user.sua', compact('user'));
    }

    public function postSua(Request $request, $id)
    {
    	$this->validate($request, [
    		'name' => 'min:5'
    	], [
    		'name.min' => 'Tên người dùng tối thiểu 5 ký tự.'
    	]);
    	$user = User::find($id);
    	$user->name = $request->name;
    	$user->quyen = $request->quyen;
    	if($request->changePassword == "on"){
    		$this->validate($request, [
    			'password' => 'min:8|max:32',
    			'repassword' => 'same:password'
    		], [
    			'password.min' => 'Mật khẩu tối thiểu 8 ký tự.',
    			'passqord.max' => 'Mật khẩu tối đa 32 ký tự.',
    			'repassword.same' => 'Xác nhận mật khẩu không đúng.'
    		]);
    		$user->password = bcrypt($request->password);
    	}
    	$user->save();

    	return redirect()->back()->with('thongbao', 'Sửa thông tin người dùng thành công.');
    }

    public function getXoa($id)
    {
    	$user = User::find($id);

    	return view('admin.user.xoa', compact('user'));
    }

    public function postXoa($id)
    {
    	$user = User::find($id);
    	$user->delete();

    	return redirect('admin/user/danhsach')->with('thongbao', 'Xóa người dùng thành công.');
    }

    //Login Admin
    public function getDangNhapAdmin()
    {
        return view('admin.login');
    }

    public function postDangNhapAdmin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('admin/tintuc/danhsach');
        }else{
            return redirect('admin/dangnhap')->with('thongbao', 'Email hoặc mật khẩu không đúng.');
        }
    }

    //Logout admin
    public function getDangXuatAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }

    //Login users
    public function getDangNhap()
    {
        return view('pages.dangnhap');
    }

    public function postDangNhap(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('trangchu');
        }else{
            return redirect('dangnhap')->with('thongbao', 'Email hoặc mật khẩu không đúng.');
        }
    }

    //Logout users
    public function getDangXuat()
    {
        Auth::logout();
        return redirect()->back();
    }

    //Register users
    public function getDangKy()
    {
        return view('pages.dangky');
    }

    public function postDangKy(UserRequest $request)
    {
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->quyen = 0;
        $users->password = bcrypt($request->password);
        $users->save();

        return redirect('dangnhap')->with('thongbao', 'Đăng ký thành công.');
    }

    //Detail accounts
    public function getSuaTK($id)
    {
        $user = User::find($id);
        return view('pages.nguoidung', compact('user'));
    }

    public function postSuaTK(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'min:5'
        ], [
            'name.min' => 'Tên người dùng tối thiểu 5 ký tự.'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        if($request->changePassword == "on"){
            $this->validate($request, [
                'password' => 'min:8|max:32',
                'repassword' => 'same:password'
            ], [
                'password.min' => 'Mật khẩu tối thiểu 8 ký tự.',
                'passqord.max' => 'Mật khẩu tối đa 32 ký tự.',
                'repassword.same' => 'Xác nhận mật khẩu không đúng.'
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->back()->with('thongbao', 'Thay đổi thông tin người dùng thành công.');
    }
}
