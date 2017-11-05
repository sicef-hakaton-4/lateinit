<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(\App\MultipleQuestion::class, function (Faker $faker) {
    return [
        'question' => $faker->sentence(),
        'answer' => $faker->sentence(3),
        'options' => [
        	$faker->sentence(3), $faker->sentence(3), $faker->sentence(3)
        ]
    ];
});

$factory->define(\App\CodeQuestion::class, function (Faker $faker) {
    return [
        'task' => $faker->paragraph(2)
    ];
});

$factory->define(\App\FileQuestion::class, function (Faker $faker) {
    return [
        'task' => $faker->paragraph(2)
    ];
});
