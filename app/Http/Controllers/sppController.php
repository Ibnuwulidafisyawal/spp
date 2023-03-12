<?php

namespace App\Http\Controllers;

use App\Models\sppModel;
use Illuminate\Http\Request;

class sppController extends Controller
{
    public function index()
    {
        $spp = sppModel::latest()->paginate(5);
        return view('spp.index', compact('spp'))->with('i', (request()->input('page',1)-1)*5);
    }

    public function create()
    {
        return view('spp.create');
    }

    public function store(Request $request , sppModel $siswa)
    {
     $request->validate([
        'tahun'=>'required',
        'nominal'=>'required',
     ]);  

     sppModel::create($request->all());
     return redirect()->route('spp.store')->with('Success','Berhasil input');
    }


    public function edit($id){

        $spp = sppModel::find($id);
        return view('spp.edit',compact('spp'));

    }

    public function update($id, Request $request , sppModel $kelas){

        $request->validate([
            'tahun'=>'required',
            'nominal'=>'required',
        ]); 
        $spp = sppModel::find($id);
        // Getting values from the blade template form
        $spp->tahun =  $request->get('tahun');
        $spp->nominal = $request->get('nominal');
        $spp->created_at = $request->get('created_at');
        $spp->save();
 
     return redirect()->route('spp.store')->with('success', 'Success updated.');

    }



    public function destroy($id){
        $post = sppModel::find($id); 
        $post->delete();
        return redirect('/spp')->with('Success','Data berhasil hapus');

    }
}
