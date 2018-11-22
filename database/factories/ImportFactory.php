<?php

use Faker\Generator as Faker;

$factory->define(App\Import::class, function (Faker $faker) {
    return [
		'size' => $faker->numberBetween(50,50000),
		'path' => implode('\\', $faker->words($faker->numberBetween(0, 4))),
		'sync' => $faker->randomElement(['to_sync','syncing','synced','sync_error']),
    ];
});
