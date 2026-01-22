<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Inventario')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 min-h-screen">

    <nav class="bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold">Sistema de Inventario</h1>
            <a href="{{ route('productos.index') }}" class="text-slate-300 hover:text-white transition">
                Inicio
            </a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-10">
        @yield('content')
    </main>

</body>
</html>
