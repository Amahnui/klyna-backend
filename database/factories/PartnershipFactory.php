<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Partnership;
use Faker\Generator as Faker;

$factory->define(Partnership::class, function (Faker $faker) {
    return [
        'fist_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone_number' => $faker->phoneNumber,
        'email' =>$faker->email,
        'city' => $faker-> city,
        'region' => $faker->word,
        'Partnership_idea' => $faker->sentence,
    ];
});
