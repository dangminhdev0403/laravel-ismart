<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifyEmailMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Kiểm tra xem email đã được xác thực chưa
            if (!$request->user()->hasVerifiedEmail()) {
                // Nếu chưa, chuyển hướng tới trang xác thực email
                $request->user()->sendEmailVerificationNotification(); //! gửi mail
                return response()->view('auth.verify-email');
            }
        }

        // Cho phép tiếp tục xử lý yêu cầu
        return $next($request);
    }



}
