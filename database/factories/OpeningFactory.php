<?php

use Faker\Generator as Faker;

$factory->define(App\Opening::class, function (Faker $faker) {
    return [
        'position' => $faker->jobTitle,
        'description' => $faker->paragraph(5),
        'requirements' => '5 godina iskustva&&timski rad',
        'level' => $faker->numberBetween(1, 4),
        'minimal_rate' => $faker->numberBetween(1, 4),
        'company_id' => 2,
        'technologies' => 'ASP.NET&&C#&&C++',
        'deadline' => $faker->date()
    ];
});
