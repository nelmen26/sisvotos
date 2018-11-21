<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SIS\User::create([
        	'nombre' => 'Administrador',
        	'nickname' => 'admin',
        	'password' => 'S1st3m4s',
        	'rol' => 'admin',
        	'remember_token' => str_random(10),
        ]);

        // SIS\User::create([
        // 	'nombre' => 'Encargado 1',
        // 	'nickname' => 'encargado1',
        // 	'password' => '123456',
        // 	'rol' => 'encargado',
        // 	'remember_token' => str_random(10),
        // ]);

        // SIS\User::create([
        // 	'nombre' => 'Operador 1',
        // 	'nickname' => 'operador1',
        // 	'password' => '123456',
        // 	'rol' => 'operador',
        // 	'remember_token' => str_random(10),
        // ]);

        //Descomentar si se desea crear usuarios por defecto para realizar pruebas (Opcional)
        // factory(SIS\Users::class,5)->create();
    }
}
