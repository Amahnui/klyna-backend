<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(0, 50),
        'region'=> $faker->word,
        'division' => $faker->word,
        'subdivision' => $faker->word,
        'city' => $faker->city,
        'municipality' => $faker->word,
        'quarter' =>$faker->word,
        'address' => $faker->address,
        'backup_telephone_number' => $faker->phoneNumber,
    ];
});
