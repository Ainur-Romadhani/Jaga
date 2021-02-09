<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class DashboardController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(){

        if(Auth::user()->role != 'admin' && Auth::user()->role != 'sekretaris' ){
            return redirect('/login');
        }
        return view('dashboard');
    }
}
