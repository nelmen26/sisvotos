<?php

use Faker\Generator as Faker;

$factory->define(SIS\Mesa::class, function (Faker $faker) {
    return [
        'nombre' => 'Mesa - '. rand(1,20),
        'recinto_id' => rand(1,20),
        'total_votar' => '0',
        'estado' => 'A',
    ];
});
