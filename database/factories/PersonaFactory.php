<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Persona;
use Faker\Generator as Faker;

$factory->define(Persona::class, function (Faker $faker) {
    return [
        'apellido' => $faker->lastName,
        'nombre' => $faker->name,
        'dni' => $faker->unique()->randomNumber($nbDigits = 8),
        'domicilio' => $faker->address,
        'telefono' => $faker->phoneNumber,
    ];
});
