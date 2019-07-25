<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\RoleUser;
use Faker\Generator as Faker;

$factory->define(RoleUser::class, function (Faker $faker) {
    $end_number = \App\Role::count();
    return [
        // 'role_id' => 3,
        // 'role_id' => rand(1,\App\Role::count()),
        'role_id' => $faker->unique()-numberBetween(1,$end_number),
    ];
});
