<?php

namespace App\Http\Controllers;

use App\Models\kelasModel;
use App\Models\siswaModel;
use App\Models\sppModel;
use Illuminate\Http\Request;
use PDO;

class siswaController extends Controller
{
    public function index()
    {
        // $siswa = siswaModel::latest()->paginate(5);
        $siswa = siswaModel::leftJoin('kelas','kelas.id_kelas','=','siswa.id_kelas')->leftJoin('spp','spp.id_spp','=','siswa.id_spp')->get();
        return view('siswa.index', compact('siswa'))->with('i', (request()->input('page',1)-1)*5);
    }

    public function create(Request $request)
    {
        // $siswa = siswaModel::leftJoin('kelas','kelas.id_kelas','=','siswa.id_kelas')->leftJoin('spp','spp.id_spp','=','siswa.id_spp')->get();
        $siswa = kelasModel::all();
        $spp = sppModel::all();
        return view('siswa.create',compact('siswa','spp'));
    }

    public function store(Request $request , siswaModel $siswa)
    {
     $request->validate([
        'nisn'=>'required',
        'nis'=>'required',
        'nama'=>'required',
        'id_kelas',
        'alamat'=>'required',
        'no_telp'=>'required',
        'id_spp',
     ]);  

     siswaModel::create($request->all());
     return redirect()->route('siswa.store')->with('Success','success create');
    }


    public function edit($id){

        // $siswa = siswaModel::leftJoin('kelas','kelas.id_kelas','=','siswa.id_kelas')->leftJoin('spp','spp.id_spp','=','siswa.id_spp')->find($id);
        $siswa = siswaModel::find($id);
        return view('siswa.edit',compact('siswa'));

    }

    public function update($id, Request $request){

        $request->validate([
            'nisn'=>'required',
            'nis'=>'required',
            'nama'=>'required',
            // 'id_kelas',
            'alamat'=>'required',
            'no_telp'=>'required',
            'id_spp',
            'created_at'=>'required',
        ]); 
        $siswa = siswaModel::leftJoin('kelas','kelas.id_kelas','=','siswa.id_kelas')->leftJoin('spp','spp.id_spp','=','siswa.id_spp')->get();
        $siswa->nisn =  $request->get('nisn');
        $siswa->nis = $request->get('nis');
        $siswa->nama = $request->get('nama');
        // $siswa->id_kelas = $request->get('id_kelas');
        $siswa->alamat = $request->get('alamat');
        $siswa->no_telp = $request->get('no_telp');
        $siswa->id_spp = $request->get('id_spp');
        $siswa->created_at = $request->get('created_at');
        $siswa->save();

        return redirect()->route('siswa.store')->with('success', 'Success updated.');

    }



    public function destroy($id){
        $post = siswaModel::find($id); 
        $post->delete();
        // return redirect('/index')->with('Success','Data berhasil hapus');
        return redirect()->route('siswa.index')->with('Success', 'Sukses Menghapus Data.');


    }

}
