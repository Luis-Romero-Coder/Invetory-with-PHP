<?php

use App\Http\Controllers\Web\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//get todos "index"
Route::get("/productos", [ProductoController::class, "Index"])-> name("productos.index");


//get uno solo "show"
Route::get("/productos", [ProductoController::class, "ShowProducto"])-> name("productos.show");

//get obterner formulario crear
Route::get("/productos/crear", [ProductoController::class, "ShowFormularioCrear"])->name("productos/crear.index");

//post crear producto
Route::post("/productos", [ProductoController::class, "CrearProducto"])->name("productos.create");

//get obtener formulario actualizar
Route::get("/productos/actualizar", [ProductoController::class, "ShowFormularioActualizarProducto"])->name("productos.index");

//put para actualizar producto
Route::put("/productos", [ProductoController::class, "ActualizarProducto"])->name("productos.update");

//delete para borrar producto
Route::delete('/productos/{id}', [ProductoController::class, "BorrarProducto"])->name("productos.destroy");
