<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(SIS\User::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'nickname' => $faker->unique()->userName,
        'password' => '123456',
        'rol' => 'encargado',
        'remember_token' => str_random(10),
    ];
});
