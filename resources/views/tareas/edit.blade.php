@extends('layouts.app')
@section('content')
    <h1 class="text-2xl font-bold mb-4">Editar Tarea</h1>
    <form action="{{ route('tareas.update', $tarea) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <label for="nombre_tarea" class="block text-gray-700">Nombre:</label>
        <input type="text" name="nombre_tarea" value="{{ $tarea->nombre_tarea }}" class="w-full p-2 border rounded">
        <label for="descripcion" class="block text-gray-700">Descripcion:</label>
        <textarea name="descripcion" class="w-full p-2 border rounded">{{ $tarea->descripcion }}</textarea>
        <div class="flex justify-start space-x-4">
            <label for="fecha_fin" class="block text-gray-700">Fecha finalización:</label>
            <button type="button" onclick="document.getElementById('fecha_fin').value = '';" class="text-sm text-red-500 underline">Vaciar</button>
        </div>
        <input type="date" id="fecha_fin" name="fecha_fin" value="{{ $tarea->fecha_fin }}" class="w-full p-2 border rounded">
        
        <label for="estado" class="block text-gray-700">Estado:</label>
        <select name="estado" id="estado" class="w-full p-2 border rounded">
            <option value="pendiente" {{ $tarea->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="en_progreso" {{ $tarea->estado == 'en_progreso' ? 'selected' : '' }}>En Progreso</option>
            <option value="completada" {{ $tarea->estado == 'completada' ? 'selected' : '' }}>Completada</option>
        </select>
        
        <div class="flex justify-end space-x-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('tareas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Volver</a>
        </div>
    </form>
@endsection