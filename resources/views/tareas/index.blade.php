@extends('layouts.app')
@section('content')
    <h1 class="text-2xl font-bold mb-4">Lista de Tareas</h1>
    <a href="{{ route('tareas.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Crear Tarea</a>
    <div class="mt-4">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Tarea</th>
                    <th class="border border-gray-300 px-4 py-2">Descripción</th>
                    <th class="border border-gray-300 px-4 py-2">Estado</th>
                    <th class="border border-gray-300 px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tareas as $tarea)
                    <tr class="text-center">
                        <td class="border border-gray-300 px-4 py-2">{{ $tarea->nombre_tarea }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $tarea->descripcion }}</td>
                        <td class="border border-gray-300 px-4 py-2 font-semibold">
                            <select class="estado-select bg-white border rounded px-2 py-1" data-id="{{ $tarea->id }}">
                                <option value="pendiente" {{ $tarea->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="en_progreso" {{ $tarea->estado == 'en_progreso' ? 'selected' : '' }}>En Progreso</option>
                                <option value="completada" {{ $tarea->estado == 'completada' ? 'selected' : '' }}>Completada</option>
                            </select>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 flex flex-col lg:flex-row justify-evenly items-center space-y-2 lg:space-y-0 lg:space-x-2">
                            <a href="{{ route('tareas.show', $tarea) }}" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded flex items-center">
                                <img src="{{ asset('images/detalles.svg') }}" alt="Detalles" class="w-6 h-6 object-contain">
                            </a>
                            <a href="{{ route('tareas.edit', $tarea) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded flex items-center">
                                <img src="{{ asset('images/editar.svg') }}" alt="Editar" class="w-6 h-6 object-contain">
                            </a>
                            <form method="POST" action="{{ route('tareas.destroy', $tarea) }}" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded flex items-center">
                                    <img src="{{ asset('images/borrar.svg') }}" alt="Borrar" class="w-6 h-6 object-contain">
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection