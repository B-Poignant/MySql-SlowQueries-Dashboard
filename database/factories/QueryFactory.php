<?php

use Faker\Generator as Faker;

$factory->define(App\Query::class, function (Faker $faker) {
    return [
        'time' => $faker->dateTimeThisYear->format(DateTime::ISO8601),
		'user' => $faker->word,
		'host' => $faker->ipv4,
		'proccess_id' => $faker->randomNumber,
		'query_time' => $faker->randomFloat(5,0,9999),
		'lock_time' => $faker->randomFloat(5,0,9999),
		'rows_sent' => $faker->randomDigitNotNull(5),
		'rows_examined' => $faker->randomDigitNotNull(5),
		'query' => $faker->sentence,
        'user_id' => App\User::all(['id'])->random(),
    ];
});