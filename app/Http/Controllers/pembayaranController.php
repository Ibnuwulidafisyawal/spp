<?php

namespace App\Http\Controllers;

use App\Models\pembayaranModel;
use App\Models\petugasModel;
use App\Models\siswaModel;
use App\Models\sppModel;
use Illuminate\Http\Request;

class pembayaranController extends Controller
{
    public function index()
    {
        // $pembayaran = pembayaranModel::latest()->paginate(5);
        $pembayaran = pembayaranModel::leftJoin('spp','spp.id_spp','=','pembayaran.id_spp')->get();

        return view('pembayaran.index', compact('pembayaran'))->with('i', (request()->input('page',1)-1)*5);
    }

    public function create()
    {
        $pembayaran = pembayaranModel::all();
        $siswa = siswaModel::all();
        $spp = sppModel::all();
        $petugas = petugasModel::where('petugas.level_user','=','siswa')->get();
        return view('pembayaran.create',compact('pembayaran','spp','siswa','petugas'));
    }

    public function store(Request $request , pembayaranModel $pembayaranModel)
    {
     $request->validate([
        'nisn'=>'required',
        // 'id_petugas'=>'required',
        'id_siswa'=>'required',
        'tgl_bayar'=>'required',
        'bulan_bayar'=>'required',
        'tahun_bayar'=>'required',
        'id_spp'=>'required',
        'jumlah_bayar'=>'required',
     ]);  
     $pembayaran = petugasModel::get();
     foreach($pembayaran as $pembayaran){
         $pembayaran->id;
     }

    //  $request['id_petugas']  =  $pembayaran->;

     pembayaranModel::create($request->all());
     return redirect()->route('pembayaran.store')->with('Success','Berhasil input');
    }


    public function edit($id){

        $pembayaran = pembayaranModel::find($id);
        // $siswa = siswaModel::leftJoin('pembayaran','pembayaran.id_siswa','=','siswa.id')->get();
        $siswa = siswaModel::all();
        $spp = sppModel::all();
        $petugas = petugasModel::where('petugas.level_user','=','siswa')->get();
        return view('pembayaran.edit',compact('pembayaran','spp','siswa','petugas'));

    }

    public function update($id, Request $request , pembayaranModel $kelas){

        $request->validate([
            'nisn'=>'required',
            'tgl_bayar'=>'required',
            'bulan_bayar'=>'required',
            'tahun_bayar'=>'required',
            'id_spp'=>'required',
            'jumlah_bayar'=>'required',
        ]); 
        $kelas = pembayaranModel::find($id);
        // Getting values from the blade template form
        $kelas->nisn =  $request->get('nisn');
        $kelas->tgl_bayar = $request->get('tgl_bayar');
        $kelas->bulan_bayar = $request->get('bulan_bayar');
        $kelas->tahun_bayar = $request->get('tahun_bayar');
        $kelas->id_spp = $request->get('id_spp');
        $kelas->jumlah_bayar = $request->get('jumlah_bayar');
        $kelas->save();
 
     return redirect()->route('pembayaran.update')->with('success', 'Success updated.');

    }



    public function destroy($id){
        $post = pembayaranModel::find($id); 
        $post->delete();
        return redirect('/index')->with('Success','Data berhasil hapus');

    }


    
}
