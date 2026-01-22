@extends('welcome')

@section('title', 'Nuevo producto')

@section('content')
<h2 class="text-2xl font-bold text-slate-800 mb-6">Crear producto</h2>

<form class="bg-white p-6 rounded-xl shadow max-w-xl space-y-4">

    <div>
        <label class="block text-sm font-medium text-slate-700">Nombre</label>
        <input type="text" class="w-full mt-1 rounded-lg border-slate-300 focus:border-blue-500 focus:ring-blue-500">
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-700">Stock</label>
        <input type="number" class="w-full mt-1 rounded-lg border-slate-300 focus:border-blue-500 focus:ring-blue-500">
    </div>

    <div class="flex justify-end gap-2">
        <a href="{{ route('productos.index') }}" class="px-4 py-2 rounded-lg border">Cancelar</a>
        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Guardar</button>
    </div>

</form>
@endsection
