<x-app-layout>
    <x-slot name="header">
        Detalle producto
    </x-slot>
<h2 class="text-2xl font-bold text-slate-800 mb-6">Detalle del producto</h2>

<div class="bg-white p-6 rounded-xl shadow max-w-xl space-y-3">
    <p><strong>ID:</strong> {{ $producto->id }}</p>
    <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
    <p><strong>Categoría:</strong> {{ $producto->categoria?->nombre ?? 'Sin categoría' }}</p>
    <p><strong>Stock:</strong> {{ $producto->stock }}</p>
    <p><strong>Price:</strong> {{ $producto->price }}</p>
    <div>
        <strong>Imagen:</strong>
        @if ($producto->imagen_path)
            <img src="{{ Storage::url($producto->imagen_path) }}" alt="Imagen de {{ $producto->nombre }}" class="mt-2 h-48 w-48 rounded object-cover">
        @else
            <span class="text-slate-500 text-sm">Sin imagen</span>
        @endif
    </div>

    <div class="flex justify-end gap-2 pt-4">
        <a href="{{ route('productos.index') }}" class="px-4 py-2 rounded-lg border">Volver</a>
        <a href="{{ route('productos.edit', $producto->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg">Editar</a>
    </div>
</div>
</x-app-layout>
