@extends('layouts.app')

@section('content')
    <h1>Editar Tarea</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tareas.update', $tarea) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre de la tarea:</label>
        <input type="text" name="nombre_tarea" value="{{ $tarea->nombre_tarea }}" required>

        <label>Descripción:</label>
        <textarea name="descripcion">{{ $tarea->descripcion }}</textarea>

        <label>Fecha de finalización:</label>
        <input type="date" name="fecha_fin" value="{{ $tarea->fecha_fin }}">

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('tareas.index') }}">Volver</a>
@endsection