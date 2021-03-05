<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnakYatim;
use Validator;

class AnakController extends Controller
{
    public function index(){

        $anak_yatim = AnakYatim::all();
        return view('admin/anak/index',compact('anak_yatim'));
    }

    public function create(){

        return view('admin/anak/create');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[

            'nama_anak'         => ['required'],
            'nama_ibu'          => ['required'],
            'nama_bapak'        => ['required'],
            'no_hp_orang_tua'   => ['required'],
            'alamat'            => ['required'],

        ]);
        
        if ($validator->fails()){
            return redirect("/createanak")
                            ->withErrors($validator)
                            ->withInput();
        }

        $data       = $request->all();
        $data['create_by']  = auth()->user()->name;
        $anak_yatim = AnakYatim::create($data);
        return redirect('/anakyatim')->with('success',"$anak_yatim->nama_anak Berhasil Ditambahkan");
    }

    public function edit($id){

        $data_anak = AnakYatim::findOrFail($id);
        return view('admin/anak/edit',compact('data_anak'));
    }

    public function update(Request $request,$id){

        $data_anak = AnakYatim::findOrFail($id);

        $validator = Validator::make($request->all(),[

            'nama_anak'         => ['required'],
            'nama_ibu'          => ['required'],
            'nama_bapak'        => ['required'],
            'no_hp_orang_tua'   => ['required'],
            'alamat'            => ['required'],

        ]);
        
        if ($validator->fails()){
            return redirect("/editanak/$data_anak->id_anak")
                            ->withErrors($validator)
                            ->withInput();
        }

        $data               = $request->all();
        $data['update_by']  = auth()->user()->name;
        $data_anak->update($data);
        return redirect('/anakyatim')->with('success',"Data Berhasil Diupdate");

    }

    public function softdelete($id){

        $data_anak = AnakYatim::findOrFail($id);
        $data_anak['delete_by'] = auth()->user()->name;
        $data_anak->save();

        $data_anak->delete();
        return redirect('/anakyatim')->with('success',"Data Berhasil Di Hapus");
    }
}
