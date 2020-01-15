<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'regular_price' => $faker->numberBetween(2000, 3000),
        'sale_price' => $faker->numberBetween(1500,2000),
        'start_price' => $faker->date(),
        'end_sale' => $faker->date(),
        'SKU' => $faker->numberBetween(200 ,900),
        'quantity' => $faker->numberBetween(100, 200),
        'stock_threshold' => $faker->numberBetween(2, 30),

    ];
});
