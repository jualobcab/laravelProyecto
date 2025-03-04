@extends('layouts.app')

@section('content')
    <h1>Crear Nueva Tarea</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tareas.store') }}" method="POST">
        @csrf
        <label>Nombre de la tarea:</label>
        <input type="text" name="nombre_tarea" required>

        <label>Descripción:</label>
        <textarea name="descripcion"></textarea>

        <label>Fecha de finalización:</label>
        <input type="date" name="fecha_fin">

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('tareas.index') }}">Volver</a>
@endsection
`