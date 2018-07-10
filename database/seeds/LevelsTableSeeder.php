<?php

use Illuminate\Database\Seeder;
use App\Level;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Level::create([
            'name'=>'atencion por telefono',
            'project_id'=>1
        ]);

        Level::create([
            'name'=>'Envio de Tecnico',
            'project_id'=>1
        ]);

        Level::create([
            'name'=>'Mesa de Ayuda',
            'project_id'=>2
        ]);

        Level::create([
            'name'=>'Consulta Especializada',
            'project_id'=>1
        ]);

    }
}
