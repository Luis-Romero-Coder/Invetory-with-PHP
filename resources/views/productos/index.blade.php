@extends('welcome')

@section('title', 'Inventario')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-slate-800">Productos</h2>

    <a href="{{ route('productos.create') }}"
       class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition">
        + Nuevo producto
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-slate-100 text-slate-700">
            <tr>
                <th class="px-4 py-3 text-left">ID</th>
                <th class="px-4 py-3 text-left">Nombre</th>
                <th class="px-4 py-3 text-left">Stock</th>
                <th class="px-4 py-3 text-right">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            {{-- Ejemplo estático --}}
            <tr>
                <td class="px-4 py-3">1</td>
                <td class="px-4 py-3">Mouse</td>
                <td class="px-4 py-3">20</td>
                <td class="px-4 py-3 text-right space-x-2">
                    <a href="{{ route('productos.show', 1) }}" class="text-blue-600 hover:underline">Ver</a>
                    <a href="{{ route('productos.edit', 1) }}" class="text-yellow-600 hover:underline">Editar</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
