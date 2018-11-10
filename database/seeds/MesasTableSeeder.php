<?php

use Illuminate\Database\Seeder;

class MesasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SIS\Mesa::class,50)->create();
    }
}
