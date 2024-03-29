<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Pengalaman;
use Faker\Generator as Faker;
use App\User;

$factory->define(Pengalaman::class, function (Faker $faker) {
    $posters = User::select("id")
        ->where("type", User::TYPE_REGULAR)
        ->get();

    return [
        "judul" => $faker->sentence(),
        "poster_id" => $posters->random()->id,
        "tema" => $faker->randomElement(Pengalaman::TEMAS),
        "cerita" => $faker->realText(),
        "pengaduan" => $faker->realText(),
        "keluhan" => $faker->realText(),
        "saran" => $faker->realText(),
    ];
});
