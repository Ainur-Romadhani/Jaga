<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Anggota;
use App\Models\AnakYatim;
use App\Models\SetoranIn;
use App\Models\SetoranOut;

class HomeController extends Controller
{
    public function index(){

        $data_out = SetoranOut::all();

        return view('public',compact('data_out'));
    }
}
