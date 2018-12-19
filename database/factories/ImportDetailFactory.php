<?php

use Faker\Generator as Faker;

$factory->define(App\ImportDetail::class, function (Faker $faker) {
    return [
        'nb_queries' => $faker->randomDigitNotNull(5),
        'nb_files' => $faker->randomDigitNotNull(5),
        'query_time' => $faker->randomFloat(5, 0, 9999),
        'lock_time' => $faker->randomFloat(5, 0, 9999),
        'rows_sent' => $faker->randomDigitNotNull(5),
        'rows_examined' => $faker->randomDigitNotNull(5),
        'import_id' => App\Import::pluck('id')->random(),
    ];
});
