<?php

use Faker\Generator as Faker;

$factory->define(SIS\Recinto::class, function (Faker $faker) {
    return [
        'nombre' => $faker->company,
        'direccion' => $faker->streetAddress,
        'estado' => 'A',
    ];
});
