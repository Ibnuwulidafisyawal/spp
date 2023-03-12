<?php

namespace App\Http\Controllers;

use App\Models\pembayaranModel;
use App\Models\petugasModel;
use Illuminate\Http\Request;
use PDF;

class siswaHomeController extends Controller
{
    public function index()
    {
       $user =  petugasModel::all();
    //    $user = json_decode(json_encode($user));
    //    $pembayaranSiswa = pembayaranModel::leftJoin('spp','spp.id_spp','=','pembayaran.id_spp')->leftJoin('petugas','petugas.id_siswa','=','pembayaran.id_petugas')->get();
       $pembayaranSiswa = pembayaranModel::leftJoin('spp','spp.id_spp','=','pembayaran.id_spp')->leftJoin('petugas','petugas.id_siswa','=','pembayaran.id_siswa')->get();
       return view('historySiswa.index', compact('pembayaranSiswa','user'))->with('i', (request()->input('page',1)-1)*5);
    }

    public function cetak_pdf()
    {
      $pembayaranSiswa = pembayaranModel::leftJoin('spp','spp.id_spp','=','pembayaran.id_spp')->leftJoin('petugas','petugas.id_siswa','=','pembayaran.id_siswa')->get();

 
      $pdf = PDF::loadview('historySiswa.pembayaranSiswa_pdf',['pembayaranSiswa'=>$pembayaranSiswa]);
      return $pdf->download('laporan-spp-pdf');

    }

}
 