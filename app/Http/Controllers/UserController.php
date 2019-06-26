<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\User;

class UserController extends Controller
{
    //
    public function index()
    {
    	$users = User::all();

    	return view('admin.user.list', compact('users'));
    }

    public function create()
    {
    	return view('admin.user.add');
    }

    public function store(UserRequest $request)
    {
        $input = $request->only('name', 'email', 'quyen');
        $input['password'] = bcrypt($request->password);
        $users = User::create($input);

    	return redirect()->back()->with('notification', 'Thêm mới người dùng thành công.');
    }

    public function edit($id)
    {
    	$users = User::findOrFail($id);
    	return view('admin.user.edit', compact('users'));
    }

    public function update(Request $request, $id)
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

        $users = User::findOrFail($id);
    	$users->update($input);

    	return redirect()->back()->with('notification', 'Sửa thông tin người dùng thành công.');
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
                return redirect('homepage');
            }
            else{
                Auth::logout();
                return redirect()->back()->with('notification', 'Tài khoản bị khóa, vui lòng liên hệ nhà cung cấp để được trợ giúp.');
            }
        }else{
            return redirect()->back()->with('notification', 'Email hoặc mật khẩu không đúng.');
        }
    }

    //Logout admin
    public function getDangXuatAdmin()
    {
        Auth::logout();
        return redirect('admin/login');
    }

    //Login users
    public function getLogin()
    {
        return view('pages.login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])){
                return redirect('homepage');
            }
            else{
                Auth::logout();
                return redirect()->back()->with('notification', 'Tài khoản bị khóa, vui lòng liên hệ nhà cung cấp để được trợ giúp.');
            }
        }else{
            return redirect()->back()->with('notification', 'Email hoặc mật khẩu không đúng.');
        }
    }

    //Logout users
    public function getLogout()
    {
        Auth::logout();
        return redirect()->back();
    }

    //Register users
    public function getRegister()
    {
        return view('pages.register');
    }

    public function postRegister(UserRequest $request)
    {
        $input = $request->only('name', 'email');
        $input['quyen'] = 0;
        $input['password'] = bcrypt($request->password);
        $users = User::create($input);

        return redirect('login')->with('notification', 'Đăng ký thành công.');
    }

    //Detail accounts
    public function getAccount($id)
    {
        $user = User::find($id);
        return view('pages.account', compact('user'));
    }

    public function postAccount(Request $request, $id)
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

        return redirect()->back()->with('notification', 'Thay đổi thông tin người dùng thành công.');
    }
}
