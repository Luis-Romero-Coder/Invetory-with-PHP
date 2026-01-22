<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index(){
        $productos = Producto::paginate(10);
        return view("productos.index", compact('productos'));
    }

    public function create(){
        return view("productos.create");
    }

    public function store(Request $request){
        Producto::create($request->all());
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show($id){
        $productos = Producto::findOrFail($id);
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
