<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'service_id' => $faker->numberBetween(0, 50),
        'rating' => $faker->numberBetween(0, 5),
        'body' => $faker->paragraph,
        'user' =>$faker->numberBetween(1 ,50),
        'verified' => $faker->boolean,
     ];
});
