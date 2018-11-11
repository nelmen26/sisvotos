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
        SIS\Tipo::create([
            'nombre'=>'TIPO ELECCION',
            'descripcion'=>'CAMBIAR EL NOMBRE Y LA DESCRIPCION',
            'estado'=>'A',
        ]);
    }
}
