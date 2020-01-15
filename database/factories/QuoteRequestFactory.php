<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\QuoteRequest;
use Faker\Generator as Faker;

$factory->define(QuoteRequest::class, function (Faker $faker) {
    return [
        'service' => $faker->word,
        'request_date' => $faker->date(),
        'telephone_number' => $faker->phoneNumber,
    ];
});
