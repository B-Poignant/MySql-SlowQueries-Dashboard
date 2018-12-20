<?php

use Faker\Generator as Faker;

$factory->define(App\Import::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'status' => $faker->randomElement(['pending', 'processing', 'done', 'error']),
        'user_id' => App\User::pluck('id')->random(),
    ];
});
