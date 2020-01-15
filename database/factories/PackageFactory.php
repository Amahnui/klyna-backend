<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Package;
use Faker\Generator as Faker;

$factory->define(Package::class, function (Faker $faker) {
    return [
        'type' => $faker->word,
        'name' => $faker->word,
        'description' => $faker->sentence,
        'cover_photo' => $faker->imageUrl(),
        'background_photo' => $faker->imageUrl(),
        'price' => $faker->numberBetween(5000, 17000)
    ];
});
