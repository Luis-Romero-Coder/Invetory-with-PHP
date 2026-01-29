<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            Inventario
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-slate-800">Productos</h2>

                <a href="{{ route('productos.create') }}"
                   class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition">
                    + Nuevo producto
                </a>
            </div>

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

            <div class="bg-white rounded-xl shadow overflow-hidden">
                <table class="w-full">
                    <thead class="bg-slate-100 text-slate-700">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Nombre</th>
                            <th class="px-4 py-3 text-left">Stock</th>
                            <th class="px-4 py-3 text-left">Price</th>
                            <th class="px-4 py-3 text-right">Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @forelse ($productos as $producto)
                            <tr>
                                <td class="px-4 py-3">{{ $producto->id }}</td>
                                <td class="px-4 py-3">{{ $producto->nombre }}</td>
                                <td class="px-4 py-3">{{ $producto->stock }}</td>
                                <td class="px-4 py-3">{{ $producto->price }}</td>
                                <td class="px-4 py-3 text-right">
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('productos.show', $producto) }}" class="text-blue-600">
                                            <x-heroicon-s-eye class="w-5 h-5"/>
                                        </a>

                                        <a href="{{ route('productos.edit', $producto) }}" class="text-yellow-600">
                                            <x-bxs-edit class="w-5 h-5"/>
                                        </a>

                                        <form action="{{ route('productos.destroy', $producto) }}" method="POST"
                                              onsubmit="return confirm('¿Seguro que deseas eliminar este producto?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600">
                                                <x-eos-delete class="w-5 h-5"/>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-6 text-slate-500">
                                    No hay productos
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="p-4">
                    {{ $productos->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
