<?php

use Faker\Generator as Faker;

$factory->define(SIS\Candidato::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName,
        'apellidos' => $faker->lastName . " " . $faker->lastName,
        'fotografia' => 'default.jpg',
        'color' => $faker->hexcolor,
        'estado' => 'A',
        'tipo_id' => 1,
    ];
});
