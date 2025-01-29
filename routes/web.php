<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\detail_resepcontroller;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\regiscontroller;
use App\Http\Controllers\resepcontroller;
use App\Http\Controllers\SuperadminController;
use App\Models\resep;
use Illuminate\Routing\RedirectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/login', [AuthController::class, 'login'])->named('login');
Route::post('/login', [AuthController::class, 'dologin'])->name('login');

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2']], function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/redirect', [RedirectController::class, 'cek'])->name('redirect');
});


// untuk superadmin
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/superadmin', [SuperadminController::class, 'index']);
});

// untuk pegawai
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/pegawai', [PegawaiController::class, 'index']);

});

Route::get('/resep', [resepcontroller::class, 'index']);
Route::get('resep/tambah', [resepcontroller::class, 'tambah']);
Route::post('/resep/simpan', [resepcontroller::class, 'simpan']);
Route::get('/modul/edit/{id}', action: [resepcontroller::class, 'edit']);
Route::put('/modul/update/{id}', [resepcontroller::class, 'update']);
Route::get('/modul/hapus/{id}', [resepcontroller::class, 'hapus']); 

Route::get('/register', [regiscontroller::class, 'showRegisterForm'])->name('register');
Route::post('/register', [regiscontroller::class, 'register'])->name('register');