<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\User;
use Validator;

class AnggotaController extends Controller
{
    public function index(){

        $anggota = Anggota::all();
        return view('admin/anggota/index',compact('anggota'));
    }

    public function create(){

        return view('admin/anggota/create');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[

            'nama_anggota'  => ['required'],
            'email'         => ['required'],
            'no_hp'         => ['required'],
            'alamat'        => ['required'],

        ]);
        
        if ($validator->fails()){
            return redirect("/createanggota")
                            ->withErrors($validator)
                            ->withInput();
        }

        $data               = $request->all();
        $data['create_by']  = auth()->user()->email;
        $anggota            = Anggota::create($data);

        $user               = User::create([
            'name'          => $data['nama_anggota'],
            'email'         => $data['email'],
            'role'          => 'anggota',
            'password'      => bcrypt('jagakali'),
        ]);
        // dd($auth);
        return redirect('/anggota')->with('success',"$anggota->nama_anggota Berhasil Ditambahkan");

    }

    public function edit($id){

        $data_anggota = Anggota::findOrFail($id);
        return view('admin/anggota/edit',compact('data_anggota'));
    }

    public function update(Request $request,$id){

        $data_anggota = Anggota::findOrFail($id);
        // dd($data_anggota);

        $validator = Validator::make($request->all(),[

            'nama_anggota'  => ['required'],
            'email'         => ['required'],
            'no_hp'         => ['required'],
            'alamat'        => ['required'],

        ]);
        
        if ($validator->fails()){
            return redirect("/editanggota/$data_anggota->id_anggota")
                            ->withErrors($validator)
                            ->withInput();
        }

        $data               = $request->all();
        $data['update_by']  = auth()->user()->name;
        $data_anggota->update($data);
        // dd($auth);
        return redirect('/anggota')->with('success',"Berhasil Diupdate");
    }

    public function softdelete($id){

        $data_anggota               = Anggota::findOrFail($id);
        $data_anggota['delete_by']  = auth()->user()->name;
        $data_anggota->save();

        $data_anggota->delete();
        return redirect('/anggota')->with('success',"Berhasil Di Hapus");

    }

    public function destroy($id){
        
    }
}
