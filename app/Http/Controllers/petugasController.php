<?php

namespace App\Http\Controllers;

use App\Models\petugasModel;
use App\Models\siswaModel;
use Illuminate\Http\Request;

class petugasController extends Controller
{
    public function index()
    {
        $user = petugasModel::get();
        return view('petugas.index', compact('user'))->with('i', (request()->input('page',1)-1)*5);
    }


    public function create(Request $request)
    {
        $user = petugasModel::all();
        $siswa = siswaModel::all();
        return view('petugas.create',compact('user','siswa'));
    }

    public function store(Request $request , petugasModel $user)
    {
     $request->validate([
        'username'=>'required',
        'password'=>'required',
        'nama_petugas'=>'required',
        'level_user'=>'required',
        'id_siswa'=>'required',
     ]);  

     $request['password'] = bcrypt($request['password']);


     petugasModel::create($request->all());
     return redirect()->route('petugas.store')->with('Success','success create');
    }

    public function destroy($id)
    {
        $user = petugasModel::findOrFail($id);
        if ($user) {
            $user->delete();
            return redirect()->route('petugas.index')->with('Success', 'success delete!');
        }
    }
}
