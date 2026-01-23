@extends('welcome')
@section('title', 'Editar producto')

@section('content')
<h2 class="text-2xl font-bold text-slate-800 mb-6">Editar producto</h2>
@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('productos.update', $producto->id) }}" method="POST" class="bg-white p-6 rounded-xl shadow max-w-xl space-y-4">
    @csrf
    @method('PUT')
    <div>
        <label class="block text-sm font-medium text-slate-700">Nombre</label>
        <input type="text" name="nombre" value="{{ $producto->nombre }}"
               class="w-full mt-1 rounded-lg border-slate-300 focus:border-blue-500 focus:ring-blue-500">
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-700">Stock</label>
        <input type="number" name="stock" value="{{ $producto->stock }}"
               class="w-full mt-1 rounded-lg border-slate-300 focus:border-blue-500 focus:ring-blue-500">
    </div>

    <div class="flex justify-end gap-2">
        <a href="{{ route('productos.index') }}" class="px-4 py-2 rounded-lg border">Cancelar</a>
        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700" onclick="return confirm('¿Estás seguro de que deseas actualizar este producto?')">Actualizar</button>
    </div>

</form>
@endsection
