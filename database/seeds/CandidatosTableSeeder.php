<?php

use Illuminate\Database\Seeder;

class CandidatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SIS\Candidato::class,3)->create();

        SIS\Candidato::create([
            'nombre' => 'Blancos',
            'apellidos' => 'Votos',
            'fotografia' => 'default.jpg',
            'color' => '#333333',
            'estado' => 'A',
            'tipo_id' => 1,
        ]);
        SIS\Candidato::create([
            'nombre' => 'Nulos',
            'apellidos' => 'Votos',
            'fotografia' => 'default.jpg',
            'color' => '#dddddd',
            'estado' => 'A',
            'tipo_id' => 1,
        ]);
    }
}
