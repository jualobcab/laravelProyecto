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
        <input type="text" name="nombre_tarea" placeholder="Nombre de la tarea" class="w-full p-2 border rounded">
        <textarea name="descripcion" placeholder="Descripción" class="w-full p-2 border rounded"></textarea>
        <input type="date" name="fecha_fin" class="w-full p-2 border rounded">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
    </form>
    <a href="{{ route('tareas.index') }}" class="text-blue-500">Volver</a>
@endsection