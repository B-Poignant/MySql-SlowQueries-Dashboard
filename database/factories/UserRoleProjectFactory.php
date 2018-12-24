<?php

use Faker\Generator as Faker;

$factory->define(App\UserRoleProject::class, function (Faker $faker) {
    return [
        'user_id' => App\User::pluck('id')->random(),
        'role_id' => App\Role::pluck('id')->random(),
        'project_id' => App\Project::pluck('id')->random(),
    ];
});
