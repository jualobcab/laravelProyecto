<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tarea;

class TareaFactory extends Factory
{
    protected $model = Tarea::class;

    public function definition()
    {
        $estado = $this->faker->randomElement(['pendiente', 'en_progreso', 'completada']);

        return [
            'nombre_tarea' => $this->faker->randomElement([
                'Revisar correos pendientes',
                'Redactar informe semanal',
                'Actualizar la base de datos',
                'Preparar presentación para reunión',
                'Llamar al proveedor de suministros',
                'Organizar archivos en la nube',
                'Coordinar reunión con el equipo',
                'Realizar pruebas de software',
                'Optimizar el código del proyecto',
                'Publicar contenido en redes sociales'
            ]),
            'descripcion' => $this->faker->randomElement([
                'Es necesario revisar todos los correos antes del mediodía.',
                'Debe incluir los resultados de la última semana y las tareas pendientes.',
                'Actualizar registros y corregir posibles errores en los datos.',
                'Preparar una presentación clara y concisa con los avances del proyecto.',
                'Contactar al proveedor para confirmar el estado del pedido.',
                'Clasificar y ordenar archivos importantes en las carpetas correctas.',
                'Programar una reunión con el equipo para revisar el progreso de las tareas.',
                'Ejecutar las pruebas automatizadas y documentar errores encontrados.',
                'Revisar el código y aplicar optimizaciones para mejorar el rendimiento.',
                'Crear y programar publicaciones para mejorar la interacción en redes.'
            ]),
            'estado' => $estado,
            'fecha_fin' => $estado === 'completada' ? $this->faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d') : null,
        ];
    }
}
