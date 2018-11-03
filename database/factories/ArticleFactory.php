<?php

use Faker\Generator as Faker;
use App\Article;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => ucwords($faker->sentence),
        'content' => $faker->realText(2000, 3),
        'status' => $faker->randomElement(array_keys(Article::STATUSES)),
        'published_date' => now()->subDay(rand(0, 30))->subMonth(rand(0, 30))
    ];
});
