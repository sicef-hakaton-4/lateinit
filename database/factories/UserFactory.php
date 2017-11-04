<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '123',
        'type' => $faker->numberBetween(1, 2)
    ];
});


$factory->define(App\ExpertDescription::class, function (Faker $faker) {
	return [
		'technologies' => 'C++&&C#&&.NET&&PHP',
		'position' => $faker->jobTitle
	];
});

$factory->define(App\CompanyDescription::class, function (Faker $faker) {
    return [
        'description' => $faker->paragraph(8),
        'founded' => $faker->year(2020),
        'employees' => $faker->numberBetween(4, 500),
        'headquarters' => $faker->address
    ];
});

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        // 'owner_id' => 1,
        // 'owner' => 1,
        'name' => $faker->catchPhrase,
        'description' => $faker->paragraph(3),
        'client' => $faker->company,
        'technologies' => 'C++&&PHP&&nodeJS',
        'position' => 'Backend developer',
        'started' => $faker->dateTime(),
        'ended' => $faker->dateTime()
    ];
});