<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $check = Auth::guard('admin')->check();
        if($check) {
            $user = Auth::guard('admin')->user();
            if($user->is_block == 1) {
                toastr()->error('Tài khoản của bạn vô hiệu hóa!');
                return redirect('/tai-khoan/index');
            }
            return $next($request);
        } else {
            toastr()->error('Chức năng này yêu cầu phải đăng nhập!');
            return redirect('/tai-khoan/index');
        }
    }
}
