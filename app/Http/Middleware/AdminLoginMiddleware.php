<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->quyen == 1 && $user->status == 1) {
                return $next($request);
            }elseif($user->status ==0){
                return redirect()->back()->with('thongbao', 'Tài khoản bị vô hiệu, liên hệ nhà cung cấp để được trợ giúp.');
            }else{
                return redirect('trangchu');
            }
        }else{
            return redirect('admin/dangnhap');
        }
    }
}
