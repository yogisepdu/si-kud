<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/profil', [ProfilController::class, 'index'])->name('profil');