<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "welcome"])->name('home');

Route::resource('productos', ProductoController::class);
