<?php

use Faker\Generator as Faker;
use App\Article;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => ucwords($faker->sentence),
        'content' => $faker->realText(2000, 3),
        'status' => $faker->randomElement(array_keys(Article::STATUSES))
    ];
});
