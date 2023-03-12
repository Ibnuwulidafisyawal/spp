<?php

use App\Http\Controllers\kelasController;
use App\Http\Controllers\pembayaranController;
use App\Http\Controllers\petugasController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\siswaHomeController;
use App\Http\Controllers\sppController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/kelas', function () {
    return view('kelas.index');
})->middleware(['auth'])->name('kelas');

Route::get('/pembayaran', function () {
    return view('pembayaran');
})->middleware(['auth'])->name('pembayaran');

Route::get('/petugas', function () {
    return view('petugas.index');
})->middleware(['auth'])->name('petugas');

Route::get('/siswa', function () {
    return view('siswa.index');
})->middleware(['auth'])->name('siswa');

Route::get('/historySiswa', function () {
    return view('historySiswa.index');
})->middleware(['auth'])->name('historySiswa');

Route::get('/pembayaran-spp', function () {
    return view('pembayaran-spp');
})->middleware(['auth'])->name('pembayaran-spp');

Route::get('/spp', function () {
    return view('spp');
})->middleware(['auth'])->name('spp');


Route::get('/historySiswa/cetak_pdf', 'App\Http\Controllers\siswaHomeController@cetak_pdf')->middleware(['auth'])->name('historySiswa');;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('dashboard/kelas', kelasController::class);
    Route::resource('dashboard/pembayaran', pembayaranController::class);
    Route::resource('dashboard/historySiswa', siswaHomeController::class);
    Route::resource('dashboard/petugas', petugasController::class);
    Route::resource('dashboard/siswa', siswaController::class);
    Route::resource('dashboard/spp', sppController::class);
});

require __DIR__.'/auth.php';
