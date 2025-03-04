<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tarea;

class TareaSeeder extends Seeder
{
    public function run()
    {
        Tarea::factory(5)->create();
    }
}
