<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Abogado;
use App\Agobado;
use Faker\Generator as Faker;

$factory->define(Abogado::class, function (Faker $faker) {
    return [
        'apellido' => $faker->lastName,
        'nombre' => $faker->name,
        'domicilio' => $faker->address,
        'telefono' => $faker->phoneNumber,
        'matricula' => $faker->unique()->randomNumber($nbDigits = 4),
        'email' => $faker->email,
    ];
});
