<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AccountController extends Controller
{
    public function login()
    {

        return view('auth/login');
    }

    public function loginPost(LoginRequest $request): RedirectResponse
    {


        $request->authenticate();

        $request->session()->regenerate();



        return redirect()->intended(route('home.index', absolute: false));
    }

    public function logout(Request $request): RedirectResponse
    {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
