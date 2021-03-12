<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth/login');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password')))
        {
            if(auth()->user()->role == 'anggota'){
                return redirect('/');
            }
            return redirect ('/dashboard');
        }
            return redirect ('/login')->with('toast_error', 'Username atau Password Salah !');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
