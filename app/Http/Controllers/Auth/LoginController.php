<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('pages.common.login');
    }

    protected function authenticated(Request $request, $user)
    {
        // Check user role and redirect accordingly
        if ($user->hasRole('staff')) {
            return redirect()->route('staff_dashboard');
        } elseif ($user->hasRole('customer')) {
            return redirect()->route('customer_dashboard');
        }

        // If the user doesn't have a specific role, redirect default location
        return redirect($this->redirectTo);
    }

    protected function guard()
    {
        return Auth::guard();
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
