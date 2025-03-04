@extends('layouts.app')
@section('content')
    <h1 class="text-2xl font-bold mb-4">Detalles de la Tarea</h1>
    <p><strong>Nombre:</strong> {{ $tarea->nombre_tarea }}</p>
    <p><strong>Descripción:</strong> {{ $tarea->descripcion }}</p>
    <p><strong>Estado:</strong> {{ $tarea->estado }}</p>
    <p><strong>Fecha de Finalización:</strong> {{ $tarea->fecha_fin }}</p>
    
    <div class="mt-4 flex justify-end space-x-4">
        <a href="{{ route('tareas.edit', $tarea) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Editar</a>
        <form method="POST" action="{{ route('tareas.destroy', $tarea) }}" class="inline">
            @csrf @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
        </form>
        <a href="{{ route('tareas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Volver</a>
    </div>
@endsection