<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductoRequest;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{

    public function index(Request $request){

        $this->authorize('viewAny', Producto::class);

        $user =auth()->user();

        $query = $user-> isAdmin() ? Producto::query() : Producto::where('user_id', $user->id);
        $query -> with('categoria');

        if($request->filled('buscar')){
            $buscar = $request->buscar;
            $query->where(function($q) use ($buscar){
                $q->where('nombre', 'like', "%{$buscar}%")
                  ->orWhere('price', 'like', "%{$buscar}%");
            });
        }

        $productos = $query->paginate(10)-> withQueryString();
        return view("productos.index", compact('productos'));
    }

    public function create(){

        $this ->authorize('create', Producto::class);

        $categorias = Categoria::orderBy('nombre')->get();
        return view("productos.create", compact('categorias'));
    }

    public function store(ProductoRequest $request){

        $this->authorize('create', Producto::class);

        $data = $request->validated();
        $data['imagen_path'] = $request->file('imagen')->store('productos','public');

        Producto::create([...$data, 'user_id' => auth()->id(),]);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show(Producto $producto){

        $this->authorize('view', $producto);

        return view("productos.show", compact('producto'));
    }

    public function edit(Producto $producto){

        $this->authorize('update', $producto);

        $categorias = Categoria::orderBy('nombre')->get();
        return view("productos.edit", compact('producto', 'categorias'));
    }

    public function update(ProductoRequest $request, Producto $producto){

        $this->authorize('update', $producto);

        $data = $request->validated();

        if($request->hasFile('imagen')){
            if($producto->imagen_path){
                Storage::disk('public')->delete($producto->imagen_path);
            }
            $data['imagen_path'] = $request->file('imagen')->store('productos','public');

        }

        $producto->update($data);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto) {

        $this->authorize('delete', $producto);

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
