<?php

use Faker\Generator as Faker;

$factory->define(App\ImportFile::class, function (Faker $faker) {
    return [
		'status' => $faker->randomElement(['pending','done']),
        'import_id' => App\Import::pluck('id')->random(),
        'number' => $faker->randomNumber,
    ];
});
