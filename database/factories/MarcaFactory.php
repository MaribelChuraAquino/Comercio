<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Marca;
use App\Categoria;
use Faker\Generator as Faker;

$factory->define(Marca::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName,
    ];
});
$factory->define(Categoria::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName,
    ];
});
