<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductoRequest;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index(Request $request){
        $query = Producto::query();
        if($request->filled('buscar')){
            $buscar = $request->buscar;
            $query->where('id', $buscar)
                  ->orWhere('nombre', 'like', "%$buscar%");
        }

        $productos = $query->paginate(10)-> withQueryString();
        return view("productos.index", compact('productos'));
    }

    public function create(){
        return view("productos.create");
    }

    public function store(ProductoRequest $request){

        Producto::create($request->validated());
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show(Producto $producto){
        return view("productos.show", compact('producto'));
    }

    public function edit(Producto $producto){
        return view("productos.edit", compact('producto'));
    }

    public function update(ProductoRequest $request, Producto $producto){

        $producto->update($request->validated());
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto) {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
