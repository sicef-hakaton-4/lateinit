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
        'password' => '123'
    ];
});


$factory->define(App\ExpertDescription::class, function (Faker $faker) {
	return [
		'technologies' => 'C++&&C#&&.NET&&PHP',
		'position' => $faker->jobTitle
	];
});
