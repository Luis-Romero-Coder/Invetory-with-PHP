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
        @hasSection('content')
            @else
                <div class="flex items-center justify-center">
                    <div class="bg-white shadow-xl rounded-2xl p-10 max-w-2xl text-center">

                        <h2 class="text-4xl font-extrabold text-slate-800">
                            👋 Bienvenido al Sistema de Inventario
                        </h2>

                        <p class="mt-4 text-slate-600">
                            Administra tus productos, controla stock y mantén tu información segura.
                        </p>

                        <div class="mt-8 flex justify-center gap-4">

                            <a href="{{ route('login') }}"
                            class="px-6 py-3 bg-slate-900 text-white rounded-xl hover:bg-slate-700 transition">
                                Iniciar sesión
                            </a>

                            <a href="{{ route('register') }}"
                            class="px-6 py-3 border border-slate-900 text-slate-900 rounded-xl hover:bg-slate-100 transition">
                                Registrarse
                            </a>

                        </div>
                    </div>
                </div>
            @endif
    </main>

</body>
</html>
