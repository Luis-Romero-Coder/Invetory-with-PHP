<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "welcome"])->name('home');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('productos', ProductoController::class);
});
