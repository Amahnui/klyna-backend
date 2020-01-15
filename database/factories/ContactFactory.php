<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'user' => $faker->numberBetween($min = 0, $max=30),
        'message' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
