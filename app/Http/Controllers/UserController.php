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
        $input = $request->only('name', 'email', 'quyen');
        $input['password'] = bcrypt($request->password);
        $user = User::create($input);

    	return redirect()->back()->with('thongbao', 'Thêm mới người dùng thành công.');
    }

    public function getSua($id)
    {
    	$user = User::findOrFail($id);
    	return view('admin.user.sua', compact('user'));
    }

    public function postSua(Request $request, $id)
    {
    	$this->validate($request, [
    		'name' => 'min:5'
    	], [
    		'name.min' => 'Tên người dùng tối thiểu 5 ký tự.'
    	]);

        $input = $request->only('name', 'quyen', 'status');
    	
        if($request->changePassword == "on"){
    		$this->validate($request, [
    			'password' => 'min:8|max:32',
    			'repassword' => 'same:password'
    		], [
    			'password.min' => 'Mật khẩu tối thiểu 8 ký tự.',
    			'passqord.max' => 'Mật khẩu tối đa 32 ký tự.',
    			'repassword.same' => 'Xác nhận mật khẩu không đúng.'
    		]);
    		$input['password'] = bcrypt($request->password);
    	}

        $user = User::findOrFail($id);
    	$user->update($input);

    	return redirect()->back()->with('thongbao', 'Sửa thông tin người dùng thành công.');
    }

    //Login Admin
    public function getDangNhapAdmin()
    {
        return view('admin.login');
    }

    public function postDangNhapAdmin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])){
                return redirect('trangchu');
            }
            else{
                Auth::logout();
                return redirect()->back()->with('thongbao', 'Tài khoản bị khóa, vui lòng liên hệ nhà cung cấp để được trợ giúp.');
            }
        }else{
            return redirect()->back()->with('thongbao', 'Email hoặc mật khẩu không đúng.');
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
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])){
                return redirect('trangchu');
            }
            else{
                Auth::logout();
                return redirect()->back()->with('thongbao', 'Tài khoản bị khóa, vui lòng liên hệ nhà cung cấp để được trợ giúp.');
            }
        }else{
            return redirect()->back()->with('thongbao', 'Email hoặc mật khẩu không đúng.');
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
        $input = $request->only('name', 'email');
        $input['quyen'] = 0;
        $input['password'] = bcrypt($request->password);
        $user = User::create($input);

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

        $input = $request->only('name');
        if($request->changePassword == "on"){
            $this->validate($request, [
                'password' => 'min:8|max:32',
                'repassword' => 'same:password'
            ], [
                'password.min' => 'Mật khẩu tối thiểu 8 ký tự.',
                'passqord.max' => 'Mật khẩu tối đa 32 ký tự.',
                'repassword.same' => 'Xác nhận mật khẩu không đúng.'
            ]);
            $input['password'] = bcrypt($request->password);
        }

        $user = User::findOrFail($id);
        $user->update($input);

        return redirect()->back()->with('thongbao', 'Thay đổi thông tin người dùng thành công.');
    }
}
