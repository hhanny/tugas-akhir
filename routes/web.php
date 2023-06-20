<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
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
    Route::resource('/dashboard', DashboardController::class);

    Route::get('/', function () {
        return view('contents.dashboard');
    })->name('landing');

    Route::get('admin/datatable', [AdminController::class, 'datatable'])->name('admin.datatable');
    Route::resource('/admin', AdminController::class);
    Route::get('/admin/create', function (){
        return view('contents.admin-account.create');
    });

    Route::get('pegawai/datatable', [PegawaiController::class, 'datatable'])->name('pegawai.datatable');
    Route::resource('/pegawai', PegawaiController::class);

    Route::get('mahasiswa/datatable', [MahasiswaController::class, 'datatable'])->name('mahasiswa.datatable');
    Route::resource('/mahasiswa', MahasiswaController::class);
    Route::get('/data-parkir', [ParkController::class, 'index'])->name('park.index');
    Route::get('/riwayat-parkir', [ParkController::class, 'parkHistory'])->name('park-history.index');
    Route::get('data-parkir/datatable', [ParkController::class, 'datatable'])->name('park.datatable');
    Route::get('data-parkir/{id?}', [ParkController::class, 'show'])->name('park.show');
    Route::get('riwayat-parkir/datatable', [ParkController::class, 'parkHistoryDatatable'])->name('park-history.datatable');

    Route::put('/profile/{id?}/update-image', [ProfileController::class, 'updateImage'])->name('profile-image.update');
    Route::delete('/profile/{id?}/delete-image', [ProfileController::class, 'destroyImage'])->name('profile-image.delete');
    Route::resource('/profile', ProfileController::class);

});

