@extends('layouts.app')

@section('content')
    <h1>Lista de Tareas</h1>
    <a href="{{ route('tareas.create') }}">Crear Tarea</a>

    @foreach ($tareas as $tarea)
        <p>{{ $tarea->nombre_tarea }} - {{ $tarea->estado }}</p>
        <a href="{{ route('tareas.show', $tarea) }}">Ver</a>
        <a href="{{ route('tareas.edit', $tarea) }}">Editar</a>
        <form method="POST" action="{{ route('tareas.destroy', $tarea) }}">
            @csrf @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    @endforeach
@endsection
