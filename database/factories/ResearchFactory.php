<?php

use Faker\Generator as Faker;

$factory->define(App\Research::class, function (Faker $faker) {
    return [
        'title' => ucwords($faker->sentence(5))
    ];
});
