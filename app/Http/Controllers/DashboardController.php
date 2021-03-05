<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Anggota;
use App\Models\AnakYatim;
use App\Models\SetoranIn;
use App\Models\SetoranOut;

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
        $bulan              = Date('m');
        $data_anggota       = Anggota::all()->count();
        $data_anak_yatim    = AnakYatim::all()->count();
        // $rp_masuk           = SetoranIn::whereMonth('created_at','=' ,$bulan)->sum('jumlah_setoran');//bulan ini
        $rp_masuk           = SetoranIn::all()->sum('jumlah_setoran');
        $masuk              = SetoranIn::all()->sum('jumlah_setoran');//total seluruh setoran masuk
        $setoran_masuk      = number_format($rp_masuk,0, ',' , '.');
        $keluar             = SetoranOut::all()->sum('dana_keluar');
        $rp_total           = $masuk - $keluar;
        $total              = number_format($rp_total,0, ',','.');
        return view('dashboard',compact('data_anggota','data_anak_yatim','setoran_masuk','total'));
    }
}
