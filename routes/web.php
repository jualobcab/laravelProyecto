<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

Route::get('/', [TareaController::class, 'index'])->name('tareas.index');
Route::resource('tareas', TareaController::class);
Route::patch('/tareas/{tarea}/estado', [TareaController::class, 'status'])->name('tareas.status');
