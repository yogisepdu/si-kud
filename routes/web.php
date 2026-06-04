<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/profil-kud', [ProfilController::class, 'index'])->name('profil');
Route::get('/struktur-kud', [ProfilController::class, 'indexStruktur'])->name('struktur');

Route::get('/layanan/pupuk', [ProdukController::class, 'layananPupuk'])->name('layanan.pupuk');
Route::get('/layanan/tbs', [ProdukController::class, 'layananTbs'])->name('layanan.tbs');
Route::get('/layanan/simpan-pinjam', [ProdukController::class, 'layananSimpanPinjam'])->name('layanan.simpanpinjam');

Route::get('/informasi/berita-all',[BeritaController::class, 'berita'])->name('berita.all');
Route::get('/berita/{slug}', [BeritaController::class, 'detailBerita'])->name('berita.detail');