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

    $username = $faker->unique()->username;
    
    return [
        'name' => $faker->name,
        'username' => $username,
        'email' => $faker->unique()->safeEmail,
        'type' => $faker->randomElement(['regular', 'researcher']),
        'email_verified_at' => now(),
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
