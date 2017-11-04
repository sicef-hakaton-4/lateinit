<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(MultipleQuestion::class, function (Faker $faker) {
    return [
        'question' => $faker->sentence(),
        'answer' => $faker->sentence(3),
        'options' =>
    ];
});
