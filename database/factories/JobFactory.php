<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    return [
        'position' => $faker->position,
        'department' => $faker->department,
        'role_summary' => $faker->sentence($nbWords = 13, $variableNbWords = true),
        'responsibilities' => $faker->sentence($nbWords = 13, $variableNbWords = true),
        'qualification'   => $faker->sentence($nbWords = 13, $variableNbWords = true),
        'is_open' => $faker->boolean,
    ];
});
