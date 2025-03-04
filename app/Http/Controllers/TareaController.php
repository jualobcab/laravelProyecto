<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::all();
        return view('tareas.index', compact('tareas'));
    }

    public function create()
    {
        return view('tareas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_tarea' => 'required|max:255',
            'descripcion' => 'nullable',
            'fecha_fin' => 'nullable|date',
        ]);

        Tarea::create($request->all());
        return redirect()->route('tareas.index')->with('success', 'Tarea creada exitosamente.');
    }

    public function show(Tarea $tarea)
    {
        return view('tareas.show', compact('tarea'));
    }

    public function edit(Tarea $tarea)
    {
        return view('tareas.edit', compact('tarea'));
    }

    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            'nombre_tarea' => 'required|max:255',
            'descripcion' => 'nullable',
            'fecha_fin' => 'nullable|date',
        ]);

        $tarea->update($request->all());
        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada.');
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada.');
    }

    public function status(Tarea $tarea)
    {
        $tarea->estado = $tarea->estado === 'pendiente' ? 'en_progreso' : 'completada';
        $tarea->save();

        return redirect()->route('tareas.index')->with('success', 'Estado cambiado.');
    }
}