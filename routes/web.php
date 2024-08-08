<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TanahPoldaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::resource('tanah-polda', TanahPoldaController::class);
    Route::post('/tanah-polda/sub', [TanahPoldaController::class, 'storeSub']);
    Route::put('/tanah-polda/sub/{id}', [TanahPoldaController::class, 'updateSub']);
    Route::delete('/tanah-polda/sub/{id}', [TanahPoldaController::class, 'destroySub']);
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
