<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OlimpiadeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NegaraController;
use App\Http\Controllers\TuanrumahController;
use App\Http\Controllers\MedaliController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PemenangController;
use App\Http\Controllers\CabangOlahragaController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\LandingController;
use App\Models\Olimpiade;
use App\Models\Negara;
use App\Models\Medali;

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

//olimpiade
//Route::get('/', [LandingController::class, 'landing'])->name('landing')->middleware('auth');

Route::get('/', function () {
    $jumlahpeserta = Olimpiade::count();
    $jumlahpesertalaki = Olimpiade::where('jenis_kelamin', 'Laki-laki')->count();
    $jumlahpesertaperempuan = Olimpiade::where('jenis_kelamin', 'Perempuan')->count();
    $jumlahnegara = Negara::count();

    return view('welcome', compact('jumlahpeserta', 'jumlahpesertalaki', 'jumlahpesertaperempuan', 'jumlahnegara'),);
})->middleware('auth');

Route::get('/olimpiade', [OlimpiadeController::class, 'index'])->name('olimpiade')->middleware('auth');

Route::get('/tambahdata', [OlimpiadeController::class, 'tambahdata'])->name('tambahdata');
Route::post('/insertdata', [OlimpiadeController::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}', [OlimpiadeController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [OlimpiadeController::class, 'updatedata'])->name('updatedata');

Route::get('/delete/{id}', [OlimpiadeController::class, 'delete'])->name('delete');

//login

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//negara

Route::get('/datanegara', [NegaraController::class, 'index'])->name('datanegara')->middleware('auth');
Route::get('/tambahnegara', [NegaraController::class, 'create'])->name('tambahnegara');

Route::post('/insertdatanegara', [NegaraController::class, 'store'])->name('insertdatanegara');

Route::get('/tampilnegara/{id}', [NegaraController::class, 'tampilnegara'])->name('tampilnegara');
Route::post('/updatedatanegara/{id}', [NegaraController::class, 'updatedatanegara'])->name('updatedatanegara');

Route::get('/deletenegara/{id}', [NegaraController::class, 'destroy'])->name('deletenegara');

// Route::get('/negara/trash', [NegaraController::class, 'trash'])->name('negaratrash');
// Route::get('/kembalinegara/{id}', [NegaraController::class, 'kembali'])->name('negarakembali');

// Route::get('/negara/hapus_permanen/{id}', [NegaraController::class, 'permanen'])->name('negarahapuspermanen');

//tuanrumah

Route::get('/tuanrumah', [TuanrumahController::class, 'index'])->name('tuanrumah')->middleware('auth');
Route::get('/tambahtuan', [TuanrumahController::class, 'tambahtuan'])->name('tambahtuan');

Route::post('/insertdatatuanrumah', [TuanrumahController::class, 'store'])->name('insertdatatuanrumah');

Route::get('/tampiltuan/{id}', [TuanrumahController::class, 'show'])->name('tampiltuan');
Route::post('/update/{id}', [TuanrumahController::class, 'update'])->name('update');

Route::get('/deletetuan/{id}', [TuanrumahController::class, 'destroy'])->name('delete');

//medali

Route::get('/medali', [MedaliController::class, 'index'])->name('medali')->middleware('auth');
Route::get('/tambahmedali', [MedaliController::class, 'create'])->name('tambahmedali');

Route::post('/insertdatamedali', [MedaliController::class, 'store'])->name('insertdatamedali');

Route::get('/tampilmedali/{id}', [MedaliController::class, 'show'])->name('tampilmedali');
Route::post('/updatedatamedali/{id}', [MedaliController::class, 'update'])->name('updatedatamedali');

Route::get('/deletemedali/{id}', [MedaliController::class, 'destroy'])->name('deletemedali');

//jadwal
Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal')->middleware('auth');
Route::get('/tambahjadwal', [JadwalController::class, 'create'])->name('tambahjadwal');

Route::post('/insertdatajadwal', [JadwalController::class, 'store'])->name('insertdatajadwal');

Route::get('/tampiljadwal/{id}', [JadwalController::class, 'show'])->name('tampiljadwal');
Route::post('/updatedatajadwal/{id}', [JadwalController::class, 'update'])->name('updatedatajadwal');

Route::get('/deletejadwal/{id}', [JadwalController::class, 'destroy'])->name('deletejadwal');

//profile dan sejarah
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('/sejarah', [SejarahController::class, 'sejarah'])->name('sejarah')->middleware('auth');

//pemenang
Route::get('/pemenang', [PemenangController::class, 'index'])->name('pemenang')->middleware('auth');
Route::get('/tambahpemenang', [PemenangController::class, 'create'])->name('tambahpemenang');

Route::post('/insertdatapemenang', [PemenangController::class, 'store'])->name('insertdatapemenang');

Route::get('/tampilpemenang/{id}', [PemenangController::class, 'show'])->name('tampilpemenang');
Route::post('/updatedatapemenang/{id}', [PemenangController::class, 'update'])->name('updatedatapemenang');

Route::get('/deletepemenang/{id}', [PemenangController::class, 'destroy'])->name('deletepemenang');

//cabangolahraga
Route::get('/cabang', [CabangOlahragaController::class, 'index'])->name('cabang')->middleware('auth');
Route::get('/tambahcabang', [CabangOlahragaController::class, 'create'])->name('tambahcabang');

Route::post('/insertdatacabang', [CabangOlahragaController::class, 'store'])->name('insertdatacabang');

Route::get('/deletecabang/{id}', [CabangOlahragaController::class, 'destroy'])->name('deletecabang');
