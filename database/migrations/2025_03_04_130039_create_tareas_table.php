<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up()
        {
            Schema::create('tareas', function (Blueprint $table) {
                $table->id('id_tarea'); // ID autoincremental
                $table->string('nombre_tarea'); // Nombre de la tarea
                $table->string('descripcion');
                $table->enum('estado', ['pendiente', 'en_progreso', 'completada'])->default('pendiente'); // Estado de la tarea
                $table->date('fecha_fin')->nullable(); // Fecha de finalización
                $table->timestamps(); // created_at y updated_at
            });
        }

        public function down()
        {
            Schema::dropIfExists('tareas');
        }
    };
?>