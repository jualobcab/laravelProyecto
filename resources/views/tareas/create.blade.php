@extends('layouts.app')
@section('content')
    <h1 class="text-2xl font-bold mb-4">Crear Nueva Tarea</h1>
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tareas.store') }}" method="POST" class="space-y-4">
        @csrf
        <label for="nombre_tarea" class="block text-gray-700">Nombre:</label>
        <input type="text" name="nombre_tarea" placeholder="Nombre de la tarea" class="w-full p-2 border rounded">
        <label for="descripcion" class="block text-gray-700">Descripcion:</label>
        <textarea name="descripcion" placeholder="Descripción" class="w-full p-2 border rounded"></textarea>
        <div class="flex justify-start space-x-4">
            <label for="fecha_fin" class="block text-gray-700">Fecha finalización:</label>
            <button type="button" onclick="document.getElementById('fecha_fin').value = '';" class="text-sm text-red-500 underline">Vaciar</button>
        </div>
        <input type="date" name="fecha_fin" class="w-full p-2 border rounded">
        <label for="estado" class="block text-gray-700">Estado:</label>
        <select name="estado" id="estado" class="w-full p-2 border rounded">
            <option value="pendiente">Pendiente</option>
            <option value="en_progreso">En Progreso</option>
            <option value="completada">Completada</option>
        </select>

        <div class="flex justify-end space-x-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('tareas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Volver</a>
        </div>
    </form>
@endsection