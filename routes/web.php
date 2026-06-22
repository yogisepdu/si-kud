<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SlipAngsuranController;
use App\Http\Controllers\SlipSimpananController;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/profil-kud', [ProfilController::class, 'index'])->name('profil');
Route::get('/struktur-kud', [ProfilController::class, 'indexStruktur'])->name('struktur');

Route::get('/layanan', [ProdukController::class, 'index'])->name('layanan');
Route::get('/layanan/{type}', [ProdukController::class, 'layanan'])->name('layanan.show');

Route::get('/informasi/berita-all', [BeritaController::class, 'berita'])->name('berita.all');
Route::get('/berita/{slug}', [BeritaController::class, 'detailBerita'])->name('berita.detail');

// Route::middleware('guest')->group(function () {
//     Route::get('/login', [AuthController::class, 'index'])->name('login');
//     Route::post('/login', [AuthController::class, 'authenticate']);
// });
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::middleware('auth')
    ->get(
        '/angsuran/{angsuran}/slip',
        [SlipAngsuranController::class, 'download']
    )
    ->name('angsuran.slip');

Route::middleware('auth')
    ->get(
        '/simpanan/{simpanan}/slip',
        [SlipSimpananController::class, 'download']
    )
    ->name('simpanan.slip');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth');
