<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('form.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();

        $request->session()->regenerate();
      $remember =  $request->has('remember');
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            // Kiểm tra nếu người dùng đã đăng nhập
            if (Auth::check()) {
                // Khôi phục giỏ hàng nếu người dùng đã đăng nhập
                Cart::restore(Auth::id());

                // Lấy role của người dùng
                $role = Auth::user()->role;

                // Chuyển hướng người dùng dựa vào role
                if ($role < 3) {
                    return redirect()->intended(route('dashboard', [], false));

                } else {
                    return redirect()->route('home');
                }
            }
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if (Auth::check()) {
            Cart::store(Auth::id());
        }
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
