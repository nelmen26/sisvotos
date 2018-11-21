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
        // Descomentar si deseas datos falsos para realizar pruebas
        //factory(SIS\Candidato::class,3)->create();
        // SIS\Candidato::create([
        //     'fotografia'=>'default.jpg',
        //     'nombre'=>'Sergio',
        //     'apellidos'=>'Padilla',
        //     'color'=>'#f00832',
        // 	'tipo_id'=>'1'
        // ]);

        // SIS\Candidato::create([
        //     'fotografia'=>'default.jpg',
        //     'nombre'=>'Cesar',
        //     'apellidos'=>'Suarez',
        //     'color'=>'#17a8a0',
        // 	'tipo_id'=>'1'
        // ]);

        // SIS\Candidato::create([
        //     'fotografia'=>'default.jpg',
        //     'nombre'=>'Pedro',
        //     'apellidos'=>'Ledezma',
        //     'color'=>'#ffe900',
        // 	'tipo_id'=>'1'
        // ]);

        // SIS\Candidato::create([
        //     'fotografia'=>'default.jpg',
        //     'nombre'=>'Blanco',
        //     'apellidos'=>'Blanco',
        //     'color'=>'#dce1ed',
        // 	'tipo_id'=>'1'
        // ]);
        // SIS\Candidato::create([
        //     'fotografia'=>'default.jpg',
        //     'nombre'=>'Nulo',
        //     'apellidos'=>'Nulo',
        //     'color'=>'#333333',
        // 	'tipo_id'=>'1'
        // ]);

        SIS\Candidato::create([
            'fotografia'=>'default.jpg',
            'nombre'=>'Jhonny',
            'apellidos'=>'Mezza',
            'color'=>'#f55050',
        	'tipo_id'=>'1'
        ]);

        SIS\Candidato::create([
            'fotografia'=>'default.jpg',
            'nombre'=>'Peter',
            'apellidos'=>'Campos',
            'color'=>'#3cd4b8',
        	'tipo_id'=>'1'
        ]);

        SIS\Candidato::create([
            'fotografia'=>'default.jpg',
            'nombre'=>'Lourdes',
            'apellidos'=>'Beltran',
            'color'=>'#b005cc',
        	'tipo_id'=>'1'
        ]);
        
        SIS\Candidato::create([
            'fotografia'=>'default.jpg',
            'nombre'=>'Florencio',
            'apellidos'=>'Limon',
            'color'=>'#21c931',
        	'tipo_id'=>'1'
        ]);

        SIS\Candidato::create([
            'fotografia'=>'default.jpg',
            'nombre'=>'Blanco',
            'apellidos'=>'Blanco',
            'color'=>'#dce1ed',
        	'tipo_id'=>'1'
        ]);

        SIS\Candidato::create([
            'fotografia'=>'default.jpg',
            'nombre'=>'Nulo',
            'apellidos'=>'Nulo',
            'color'=>'#333333',
        	'tipo_id'=>'1'
        ]);
    }
}
