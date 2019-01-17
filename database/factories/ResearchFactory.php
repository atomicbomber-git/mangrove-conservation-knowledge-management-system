<?php

use Faker\Generator as Faker;

$factory->define(App\Research::class, function (Faker $faker) {
    return [
        'year' => rand(2000, 2019),
        'description' => $faker->paragraph,
        'title' => ucwords($faker->sentence(5))
    ];
});
