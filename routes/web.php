<?php

use App\Http\Controllers\AntrianController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UsersController;
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
    return view('welcome');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
});

Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [UsersController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/admin/poligigi', [AntrianController::class, 'laporanPoliGigi'])->middleware('userAkses:admin');
    Route::get('/admin/poliumum', [AntrianController::class, 'laporanPoliUmum'])->middleware('userAkses:admin');
    Route::get('/admin/polimata', [AntrianController::class, 'laporanPoliMata'])->middleware('userAkses:admin');
    Route::get('/teller', [UsersController::class, 'teller'])->middleware('userAkses:teller');
    Route::get('/teller/poligigi', [AntrianController::class, 'poliGigi'])->middleware('userAkses:teller');
    Route::get('/teller/poliumum', [AntrianController::class, 'poliUmum'])->middleware('userAkses:teller');
    Route::get('/teller/polimata', [AntrianController::class, 'poliMata'])->middleware('userAkses:teller');
    Route::get('/logout', [SesiController::class, 'logout']);
});

Route::get('/antrian', [AntrianController::class, 'createAntrian'])->name('antrian');
Route::post('/antrian', [AntrianController::class, 'createAntrian'])->name('antrian');

Route::get('/antrian/{poli}/nomor-antrian-terakhir', [AntrianController::class, 'getNomorAntrianTerakhir'])->name('antrian');
Route::post('/antrian/{poli}/buat-nomor-antrian-baru', [AntrianController::class, 'buatNomorAntrianBaru'])->name('antrian');

Route::get('/cetak', [AntrianController::class, 'cetakAntrian'])->name('cetakAntrian');
Route::post('/cetak', [AntrianController::class, 'cetakAntrian'])->name('cetakAntrian');

Route::get('/admin/cetak', [AntrianController::class, 'cetakLaporan'])->name('cetakLaporan');
Route::post('/admin/cetak', [AntrianController::class, 'cetakLaporan'])->name('cetakLaporan');
