<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestor de Tareas')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto">
            <a class="text-white text-lg font-bold" href="{{ route('tareas.index') }}">Gestor de Tareas</a>
        </div>
    </nav>

    <div class="container mx-auto mt-6 p-4 bg-white shadow-lg rounded-lg">
        @yield('content')
    </div>
</body>
</html>