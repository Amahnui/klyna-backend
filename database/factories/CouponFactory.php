<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Coupon;
use Faker\Generator as Faker;

$factory->define(Coupon::class, function (Faker $faker) {
    return [
        'code' => $faker->word,
        'price' => $faker->numberBetween(200, 5000),
        'discount_type' => $faker->word,
        'type' => $faker->word,
        'description' => $faker->sentence(20, true),
        'expiration_date' => $faker->date(),
        'usage_count' => $faker->numberBetween(0,100),
        'exclude_sale_items' => $faker->boolean,
        'individual_use' => $faker->boolean,
        'service' => $faker->word,
        'usage_limit' => $faker->numberBetween(0, 5),
        'minimum_limit' => $faker->numberBetween(5000, 5000),
        'maximum_limit' => $faker->numberBetween(5000, 5000),
        'usage_limit_per_user' => $faker->numberBetween(0, 5),
    ];
});
