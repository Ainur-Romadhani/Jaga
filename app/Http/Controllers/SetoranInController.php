<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SetoranIn;
use App\Models\Anggota;
use Validator;

class SetoranInController extends Controller
{
    public function index(){

        $data_setoranIn = SetoranIn::all();
        return view('admin/setoranIn/index',compact('data_setoranIn'));

    }

    public function create(){

        $data_anggota   = Anggota::all();
        return view('admin/setoranIn/create',compact('data_anggota'));

    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[

            'nama_penyetor'          => ['required'],
            'jumlah_setoran'         => ['required']

        ]);
        
        if ($validator->fails()){
            return redirect("/createsetoranIn")
                            ->withErrors($validator)
                            ->withInput();
        }

        $data               = $request->all();
        $data['create_by']  = auth()->user()->name;
        if($data['nama_penyetor'] == "Pilih"){
        
        return redirect("/createsetoranIn")->with('warning', 'Silahkan Pilih Penyetor !');
        }
        $data_setoran       = SetoranIn::create($data);
        return redirect('/setoranIn')->with('success',"Setoran Sukses ");
    }

    public function edit($id){

        $data_setoran   = SetoranIn::findOrFail($id);
        $data_anggota   = Anggota::all();
        return view('admin/setoranIn/edit',compact('data_setoran','data_anggota'));
    }

    public function update(Request $request,$id){

        $data_setoran   = SetoranIn::findOrFail($id);

        $validator      = Validator::make($request->all(),[

            'nama_penyetor'          => ['required'],
            'jumlah_setoran'         => ['required']

        ]);
        
        if ($validator->fails()){
            return redirect("/editsetoranIn/$data_setoran->id_setoran")
                            ->withErrors($validator)
                            ->withInput();
        }
        $data               = $request->all();
        if($data['nama_penyetor'] == "Pilih"){
        
            return redirect("/editsetoranIn/$data_setoran->id_setoran")->with('warning', 'Silahkan Pilih Penyetor !');
        }
        $data['update_by']  = auth()->user()->name;
        $data_setoran->update($data);
        return redirect('/setoranIn')->with('success',"Setoran Di update ");

    }

    public function softdelete($id){

        $data_setoran = SetoranIn::findOrFail($id);
        $data_setoran['delete_by'] = auth()->user()->name;
        $data_setoran->save();

        $data_setoran->delete();
        return redirect('/setoranIn')->with('success',"Setoran Di Hapus ");
    }
}
