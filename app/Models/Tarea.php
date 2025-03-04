<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Tarea extends Model {
        use HasFactory;

        protected $table = 'tareas';
        protected $primaryKey = 'id_tarea';
        protected $fillable = ['nombre_tarea', 'descripcion', 'estado', 'fecha_fin'];
    }
?>
