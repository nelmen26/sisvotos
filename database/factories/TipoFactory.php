<?php

use Faker\Generator as Faker;

$factory->define(SIS\Tipo::class, function (Faker $faker) {
    return [
        'nombre' => $faker->word,
        'descripcion' => $faker->sentence,
        'estado' => 'A',
    ];
});
