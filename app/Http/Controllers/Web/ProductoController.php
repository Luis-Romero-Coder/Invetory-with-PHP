<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index(){
        return view("productos.index");
    }

    public function create(){
        return view("productos.create");
    }

    public function store(){
        return "producto guardado";
    }

    public function show($id){
        return view("productos.show");
    }

    public function edit($id){
        return view("productos.edit");
    }

    public function update($id){
        return "producto actualizado";
    }

    public function destroy($id) {
        return "producto eliminado";
    }
}
