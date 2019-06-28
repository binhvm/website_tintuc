<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class SuperadminMiddleware
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
            if (Auth::user()->quyen > 1) {
                return $next($request);
            }else{

                return redirect()->back()->with('notification', 'Bạn không đủ quyền truy cập trang.');
            }
        }else{
            return redirect('admin/login');
        }
    }
}
