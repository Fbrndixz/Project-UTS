<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\LaporanPasienController;
use App\Http\Controllers\LaporanDaftarController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\PoliController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dokter', [ProfilController::class, 'index']);
// Route::get('/dokter/create', [ProfilController::class, 'create']);
// Route::get('/dokter/{id}/edit', [ProfilController::class, 'edit']);
// Route::get('/dokter/{id}', [ProfilController::class, 'show']);

// // Pasien
// Route::get('/pasien', [PasienController::class, 'index']);
// Route::get('/pasien/create', [PasienController::class, 'create']);
// Route::post('/pasien', [PasienController::class, 'store']);
// // Route::resource('pasien', PasienController::class);

// // Poli
// Route::get('/poli/create', [PoliController::class, 'create']);

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware([Authenticate::class])->group(function () {
    Route::resource('pasien', PasienController::class);
    Route::resource('daftar', DaftarController::class);
    Route::resource('poli', PoliController::class);
    Route::resource('polis', PoliController::class);
    Route::resource('laporan-pasien', LaporanPasienController::class);
    Route::resource('laporan-daftar', LaporanDaftarController::class);
    });
