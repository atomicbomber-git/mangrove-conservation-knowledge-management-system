<?php

use Faker\Generator as Faker;
use App\Article;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => ucwords($faker->sentence),
        'author_first_name' => $faker->firstName(),
        'author_last_name' => $faker->lastName(),
        'content' => $faker->realText(2000, 3),
        'status' => $faker->randomElement(array_keys(Article::STATUSES)),
        'published_date' => now()->subDay(rand(0, 30))->subMonth(rand(0, 30))
    ];
});
