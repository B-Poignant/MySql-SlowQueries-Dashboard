<?php

use Faker\Generator as Faker;

$factory->define(App\Import::class, function (Faker $faker) {
    return [
		'status' => $faker->randomElement(['pending','in_progress','done','error']),
        'user_id' => App\User::pluck('id')->random(),
    ];
});
