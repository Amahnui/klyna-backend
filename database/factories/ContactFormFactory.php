<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ContactForm;
use Faker\Generator as Faker;

$factory->define(ContactForm::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'subject' => $faker->sentence(6,true),
        'email' => $faker->email,
        'telephone'=> $faker->phoneNumber,
        'message' => $faker->sentence(30, true),
    ];
});
