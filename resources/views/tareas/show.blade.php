@extends('layouts.app')

@section('content')
    <h1>Detalles de la Tarea</h1>

    <p><strong>Nombre:</strong> {{ $tarea->nombre_tarea }}</p>
    <p><strong>Descripción:</strong> {{ $tarea->descripcion }}</p>
    <p><strong>Estado:</strong> {{ $tarea->estado }}</p>
    <p><strong>Fecha de Finalización:</strong> {{ $tarea->fecha_fin }}</p>

    <a href="{{ route('tareas.edit', $tarea) }}">Editar</a>
    
    <form method="POST" action="{{ route('tareas.destroy', $tarea) }}" style="display:inline;">
        @csrf @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>

    <a href="{{ route('tareas.index') }}">Volver</a>
@endsection