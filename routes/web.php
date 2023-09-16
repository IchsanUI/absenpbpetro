<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsenController;
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
    return view('welcome');
});


Route::get('/atlit', [UserController::class, 'index'])->name('users.index');
Route::post('/saveData', [UserController::class, 'simpanData'])->name('saveData.atlit');
// Route::post('/simpan-data', [UserController::class, 'simpanData'])->middleware('web')->name('saveData.atlit');
Route::post('/absen', [AbsenController::class, 'absen'])->name('absen');
Route::post('/batalAbsen', [AbsenController::class, 'batalAbsen'])->name('batalAbsen');
Route::get('/jumlah-absensi', [AbsenController::class, 'getJumlahAbsensi'])->name('jumlahAbsensi');

// Route::post('/absen', 'AbsenController@absen')->name('absen');
