<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\MahasiswaController;

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


Route::get('/sign-in', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/sign-in', [LoginController::class, 'auth'])->name('login-proccess')->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::get('/sign-out', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
    Route::get('/dashboard', function () {
        return view('contents.dashboard');
    })->name('dashboard');

    Route::get('/', function () {
        return view('contents.dashboard');
    })->name('landing');

    Route::get('admin/datatable', [AdminController::class, 'datatable'])->name('admin.datatable');
    Route::resource('/admin', AdminController::class);

    Route::get('pegawai/datatable', [PegawaiController::class, 'datatable'])->name('pegawai.datatable');
    Route::resource('/pegawai', PegawaiController::class);

    Route::get('mahasiswa/datatable', [MahasiswaController::class, 'datatable'])->name('mahasiswa.datatable');
    Route::resource('/mahasiswa', MahasiswaController::class);


});

