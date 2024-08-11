<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RumdinController;
use App\Http\Controllers\RumdinGolonganController;
use App\Http\Controllers\TanahPoldaKesatuanController;
use App\Http\Controllers\TanahSatkerMabesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('tanah-satker-mabes/{id}/sub', [TanahSatkerMabesController::class, 'create']);
    Route::get('rumdin/{id}/sub', [RumdinController::class, 'create']);
    Route::get('rumdin-golongan/{id}/sub', [RumdinGolonganController::class, 'create']);

    Route::resource('tanah-polda', TanahPoldaKesatuanController::class);
    Route::resource('tanah-satker-mabes', TanahSatkerMabesController::class);
    Route::resource('rumdin', RumdinController::class);
    Route::resource('rumdin-golongan', RumdinGolonganController::class);
    Route::resource('user', UserController::class);

    // Route::resource('tanah-polda', TanahPoldaController::class);
    // Route::post('/tanah-polda/sub', [TanahPoldaController::class, 'storeSub']);
    // Route::put('/tanah-polda/sub/{id}', [TanahPoldaController::class, 'updateSub']);
    // Route::delete('/tanah-polda/sub/{id}', [TanahPoldaController::class, 'destroySub']);
});

Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('getkab', [ProfileController::class, 'getKab'])->name('profile.getkab');
    Route::post('getkec', [ProfileController::class, 'getKec'])->name('profile.getkec');
});

require __DIR__ . '/auth.php';

// Sign in with social account
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);
