<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tarea;

class TareaFactory extends Factory
{
    protected $model = Tarea::class;

    public function definition()
    {
        return [
            'nombre_tarea' => $this->faker->sentence(3),
            'descripcion' => $this->faker->paragraph(),
            'estado' => $this->faker->randomElement(['pendiente', 'en_progreso', 'completada']),
            'fecha_fin' => $this->faker->date(),
        ];
    }
}

