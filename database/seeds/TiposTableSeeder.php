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
            'nombre'=>'Rector',
            'descripcion'=>'Rector de la Universidad',
            'estado'=>'A',
        ]);

        SIS\Tipo::create([
            'nombre'=>'Vicerrector',
            'descripcion'=>'Vicerrector de la Universidad',
            'estado'=>'A',
        ]);

        // factory(SIS\Tipo::class,5)->create();
    }
}
