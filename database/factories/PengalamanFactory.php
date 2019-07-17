<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Pengalaman;
use Faker\Generator as Faker;
use App\User;

$posters = User::select("id")
    ->get()
    ->shuffle();

$factory->define(Pengalaman::class, function (Faker $faker) use($posters) {
    return [
        "poster_id" => $posters->random()->id,
        "tema" => ucfirst($faker->sentence()),
        "cerita" => $faker->realText(),
        "pengaduan" => $faker->realText(),
        "keluhan" => $faker->realText(),
        "saran" => $faker->realText(),
    ];
});
