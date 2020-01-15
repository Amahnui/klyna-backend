<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PickupRequest;
use Faker\Generator as Faker;

$factory->define(PickupRequest::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(0, 50),
        'attended_to' => $faker->boolean,
        'agent_id' => $faker->numberBetween(0, 50)
    ];
});
