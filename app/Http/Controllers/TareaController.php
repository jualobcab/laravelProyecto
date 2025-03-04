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
            'descripcion' => 'required',
            'estado' => 'required|in:pendiente,en_progreso,completada',
            'fecha_fin' => [
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->estado === 'completada' && is_null($value)) {
                        $fail('La fecha de finalización es obligatoria cuando la tarea está completada.');
                    }
                    if (in_array($request->estado, ['pendiente', 'en_progreso']) && !is_null($value)) {
                        $fail('La fecha de finalización debe ser nula si la tarea no está completada.');
                    }
                },
            ],
            ], [
                'nombre_tarea.required' => 'El nombre de la tarea es obligatorio.',
                'nombre_tarea.max' => 'El nombre de la tarea no puede exceder los 255 caracteres.',
                'descripcion.required' => 'La descripción puede estar vacía, pero debe ser un texto válido.',
                'estado.required' => 'El estado de la tarea es obligatorio.',
                'estado.in' => 'El estado debe ser "pendiente", "en_progreso" o "completada".',
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
            'descripcion' => 'required',
            'estado' => 'required|in:pendiente,en_progreso,completada',
            'fecha_fin' => [
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->estado === 'completada' && is_null($value)) {
                        $fail('La fecha de finalización es obligatoria cuando la tarea está completada.');
                    }
                    if (in_array($request->estado, ['pendiente', 'en_progreso']) && !is_null($value)) {
                        $fail('La fecha de finalización debe ser nula si la tarea no está completada.');
                    }
                },
            ],
            ], [
                'nombre_tarea.required' => 'El nombre de la tarea es obligatorio.',
                'nombre_tarea.max' => 'El nombre de la tarea no puede exceder los 255 caracteres.',
                'descripcion.required' => 'La descripción puede estar vacía, pero debe ser un texto válido.',
                'estado.required' => 'El estado de la tarea es obligatorio.',
                'estado.in' => 'El estado debe ser "pendiente", "en_progreso" o "completada".',
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