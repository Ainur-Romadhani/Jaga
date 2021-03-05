<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SetoranOut;
use App\Models\AnakYatim;
use Validator;
use Storage;
use File;

class SetoranOutController extends Controller
{
    public function index(){
        $data_setoranOut = SetoranOut::all();
        return view('admin/setoranout/index',compact('data_setoranOut'));
    }

    public function create(){

        $data_anak = AnakYatim::all();
        return view('admin/setoranout/create',compact('data_anak'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[

            'penerima'              => ['required'],
            'dana_keluar'           => ['required'],
            'keperluan'             => ['required'],
            'dokumentasi'           => ['required']

        ]);
        
        if ($validator->fails()){
            return redirect("/createsetoranOut")
                            ->withErrors($validator)
                            ->withInput();
        }

        $data = $request->all();
        $data['create_by']  = auth()->user()->name;
        if($data['penerima'] == "Pilih"){
        
        return redirect("/createsetoranOut")->with('warning', 'Silahkan Pilih Penerima !');
        }

        if($request->hasFile('dokumentasi')){
            $dokumentasi = $request->file('dokumentasi');
            $ext = $dokumentasi->getClientOriginalExtension();
            if($request->file('dokumentasi')->isValid()){
                $foto_name = date('YmdHis'). ".$ext";
                $upload_path = 'dokumentasi';
                $request->file('dokumentasi')->move($upload_path,$foto_name);
                $data['dokumentasi'] = $foto_name;
            }
        }

        $setoran = SetoranOut::create($data);
        return redirect('/setoranOut')->with('success',"Setoran keluar Sukses ");

    }

    public function edit($id){

        $data_setoran   = SetoranOut::findOrFail($id);
        // dd($data_setoran);
        $data_anak      = AnakYatim::all();
        return view('admin/setoranout/edit',compact('data_setoran','data_anak'));

    }

    public function update(Request $request,$id){

        $data_setoran = SetoranOut::findOrFail($id);

        $validator = Validator::make($request->all(),[

            'penerima'              => ['required'],
            'dana_keluar'           => ['required'],
            'keperluan'             => ['required'],
            'dokumentasi'           => ['required']

        ]);
        
        if ($validator->fails()){
            return redirect("/editsetoranOut/$data->id_setoran_out")
                            ->withErrors($validator)
                            ->withInput();
        }

        $data = $request->all();

        //hapus foto sebelumnya
        File::delete('dokumentasi/'.$data_setoran->dokumentasi);

        //insert foto baru
        if($request->hasFile('dokumentasi')){
            $dokumentasi = $request->file('dokumentasi');
            $ext = $dokumentasi->getClientOriginalExtension();
            if($request->file('dokumentasi')->isValid()){
                $foto_name = date('YmdHis'). ".$ext";
                $upload_path = 'dokumentasi';
                $request->file('dokumentasi')->move($upload_path,$foto_name);
                $data['dokumentasi'] = $foto_name;
            }
        }
        $data['update_by']  = auth()->user()->name;
        $data_setoran->update($data);
        return redirect('/setoranOut')->with('success',"Setoran Di update ");
        
    }

    public function softdelete($id){

        $data_setoran               = SetoranOut::findOrFail($id);
        $data_setoran['delete_by']  = auth()->user()->name;
        $data_setoran->save();

        $data_setoran->delete();
        return redirect('/setoranOut')->with('success',"Setoran Di Hapus ");
    }
}
