<?php

use Illuminate\Database\Seeder;

class RecintosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SIS\Recinto::create([
        //     'nombre' => 'Facultad de Tecnologias',
        //     'direccion' => 'Campero 123',
        //     'estado' => 'A',
        // ]);
        // SIS\Recinto::create([
        //     'nombre' => 'Facultad de Medicina',
        //     'direccion' => 'Colon 123',
        //     'estado' => 'A',
        // ]);
        // SIS\Recinto::create([
        //     'nombre' => 'Facultad de Derecho',
        //     'direccion' => 'Junin 123',
        //     'estado' => 'A',
        // ]);
        // SIS\Recinto::create([
        //     'nombre' => 'Facultad de Contaduria y Financiera',
        //     'direccion' => 'Grau 123',
        //     'estado' => 'A',
        // ]);
        // SIS\Recinto::create([
        //     'nombre' => 'Facultad de Arquitectura',
        //     'direccion' => 'Bolivar 123',
        //     'estado' => 'A',
        // ]);

        factory(SIS\Recinto::class,20)->create();
    }
}
