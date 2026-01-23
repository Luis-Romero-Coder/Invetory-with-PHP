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
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif
        <div class="mb-4">
            <form method="GET" action="{{ route('productos.index') }}" class="flex gap-2 max-w-md">
                <input type="text" name="buscar"
                    value="{{ request('buscar') }}"
                    placeholder="Buscar por ID o nombre..."
                    class="w-full rounded-lg border-slate-300 focus:border-blue-500 focus:ring-blue-500">

                <button class="bg-slate-800 text-white px-4 py-2 rounded-lg hover:bg-slate-900">
                    Buscar
                </button>
            </form>
        </div>

    <table class="w-full">
        <div class="mt-4">
            {{ $productos->links() }}
        </div>
        <thead class="bg-slate-100 text-slate-700">
            <tr>
                <th class="px-4 py-3 text-left">ID</th>
                <th class="px-4 py-3 text-left">Nombre</th>
                <th class="px-4 py-3 text-left">Stock</th>
                <th class="px-4 py-3 text-right">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse ($productos as $producto)
                <tr>
                    <td class="px-4 py-3">{{ $producto->id }}</td>
                    <td class="px-4 py-3">{{ $producto->nombre }}</td>
                    <td class="px-4 py-3">{{ $producto->stock }}</td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex justify-end gap-3">

                            <a href="{{ route('productos.show', $producto->id) }}" class="text-blue-600 hover:underline"><x-heroicon-s-eye class="w-5 h-5"/></a>
                            <a href="{{ route('productos.edit', $producto->id) }}" class="text-yellow-600 hover:underline"><x-bxs-edit class="w-5 h-5"/></a>

                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST"
                                onsubmit="return confirm('¿Seguro que deseas eliminar este producto?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="text-red-600 hover:underline cursor-pointer"><x-eos-delete class="w-5 h-5"/></button>
                            </form>

                        </div>
                    </td>
                </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>
@endsection
