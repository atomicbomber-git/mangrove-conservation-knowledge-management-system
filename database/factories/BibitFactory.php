<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Bibit::class, function (Faker $faker) {
    return [
        "spesies" => ucfirst($faker->sentence()),
        "famili" => ucfirst($faker->word()),
        "deskripsi" => $faker->sentence(),
        "daun" => $faker->sentence(),
        "bunga" => $faker->sentence(),
        "buah" => $faker->sentence(),
        "ekologi" => $faker->sentence(),
        "penyebaran" => $faker->sentence(),
        "kelimpahan" => $faker->sentence(),
        "manfaat" => $faker->sentence(),
        "catatan" => $faker->sentence(),
    ];
});
