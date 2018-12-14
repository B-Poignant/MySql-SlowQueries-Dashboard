<?php

use Faker\Generator as Faker;

$factory->define(App\Import::class, function (Faker $faker) {
    return [
		'sync' => $faker->randomElement(['to_sync','syncing','synced','sync_error']),
        'user_id' => App\User::all(['id'])->random(),
    ];
});
