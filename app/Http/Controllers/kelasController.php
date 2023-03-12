<?php

namespace App\Http\Controllers;

use App\Models\kelasModel;
use Illuminate\Http\Request;

class kelasController extends Controller
{
    public function index()
    {
        $kelas = kelasModel::latest()->paginate(5);
        return view('kelas.index', compact('kelas'))->with('i', (request()->input('page',1)-1)*5);
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request , kelasModel $kelas)
    {
     $request->validate([
        'nama_kelas'=>'required',
        'kompetensi_keahlian'=>'required',
        'created_at'=> 'required',
     ]);  

     kelasModel::create($request->all());
     return redirect()->route('kelas.store')->with('success','Success Create');
    }

    public function edit($id){

        $kelas = kelasModel::find($id);
        return view('kelas.edit',compact('kelas'));

    }

    public function update($id, Request $request , kelasModel $kelas){

        $request->validate([
            'nama_kelas'=>'required',
            'kompetensi_keahlian'=>'required',
            'created_at'=> 'required',
        ]); 
        $kelas = kelasModel::find($id);
        // Getting values from the blade template form
        $kelas->nama_kelas =  $request->get('nama_kelas');
        $kelas->kompetensi_keahlian = $request->get('kompetensi_keahlian');
        $kelas->created_at = $request->get('created_at');
        $kelas->save();
 
     return redirect()->route('kelas.store')->with('success', 'Success updated.');

    }



    public function destroy($id){
        $post = kelasModel::find($id); 
        $post->delete();
        return redirect('/kelas')->with('Success','Data berhasil hapus');

    }
}
