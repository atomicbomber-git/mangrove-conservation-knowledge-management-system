<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Definisi;
use Faker\Generator as Faker;

$factory->define(Definisi::class, function (Faker $faker) {
    return [
        "title" => ucwords($faker->sentence),
        "content" => $faker->realText(10000),
    ];
});
