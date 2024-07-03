<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
 
Route::get('/auth/{provider}/callback', [ProviderController::class,'callback']);
Route::get('/dashboard', [ProviderController::class, 'callback'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
