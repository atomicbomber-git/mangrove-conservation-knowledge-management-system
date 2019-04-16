<?php

use Faker\Generator as Faker;
use App\Research;

$factory->define(App\Research::class, function (Faker $faker) {
    return [
        'year' => rand(2000, 2019),
        'description' => $faker->realText(1600),
        'title' => ucwords($faker->sentence(5)),
        'status' => $faker->randomElement(array_keys(Research::STATUSES))
    ];
});
