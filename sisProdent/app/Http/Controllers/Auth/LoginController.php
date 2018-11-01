<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function formLogin(){
        return view('auth.login');
    }

    public function login(){
        $credentials = $this->validate(request(), [
            'email' => 'email|required',
            'password' => 'required|string|min:4'
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => trans('auth.failed')])
            ->withInput(request(['email']));
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
