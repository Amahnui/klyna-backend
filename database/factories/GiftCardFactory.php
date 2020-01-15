<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\GiftCard;
use Faker\Generator as Faker;

$factory->define(GiftCard::class, function (Faker $faker) {
    return [
        'code' => $faker->word,
        'service' => $faker->word,
        'price'  => $faker->numberBetween(1000, 3000),
        'expiration_date' => $faker->date(),
        'is_used'=> $faker->boolean,
    ];
});
