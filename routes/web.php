<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

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
    Route::get('/dashboard', function () {
        return view('contents.dashboard');
    })->name('dashboard');

    Route::get('/', function () {
        return view('contents.dashboard');
    })->name('landing');

    Route::get('admin/datatable', [AdminController::class, 'datatable'])->name('admin.datatable');
    Route::resource('/admin', AdminController::class);
});

