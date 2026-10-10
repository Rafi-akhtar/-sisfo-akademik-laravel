<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('mapel', MapelController::class);
    Route::resource('nilai', NilaiController::class);

});