<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function Index(){
        return "todos los productos";
    }

    public function ShowProducto(){
        return "un solo producto";
    }

    public function ShowFormularioCrear(){
        return "formulario";
    }

    public function CrearProducto(){
        return "producto creado";
    }

    public function ShowFormularioActualizarProducto(){
        return "formulario para actualizar";
    }

    public function ActualizarProducto(){
        return "producto actualizado";
    }

    public function BorrarProducto($id) {
        return "producto eliminado";
    }
}
