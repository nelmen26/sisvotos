<?php

use Illuminate\Database\Seeder;

class TiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SIS\Tipo::create([
        //     'nombre'=>'RECTOR',
        //     'descripcion'=>'MAXIMA AUTORIDAD U.S.F.X.',
        //     // 'estado'=>'A',
        // ]);
        SIS\Tipo::create([
            'nombre'=>'VICERECTOR',
            'descripcion'=>'SEGUNDA AUTORIDAD U.S.F.X.',
            // 'estado'=>'A',
        ]);
    }
}
