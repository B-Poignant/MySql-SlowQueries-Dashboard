<?php

use Faker\Generator as Faker;

$factory->define(App\Import::class, function (Faker $faker) {
    return [
		'status' => $faker->randomElement(['waiting','done']),
        'import_id' => App\Import::all(['id'])->random(),
        'number' => $faker->randomNumber,
    ];
});
