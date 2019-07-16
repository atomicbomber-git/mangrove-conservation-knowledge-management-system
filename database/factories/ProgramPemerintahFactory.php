<?php

use Faker\Generator as Faker;
use Jenssegers\Date\Date;
use App\ProgramPemerintah;
use App\Bibit;

$factory->define(App\ProgramPemerintah::class, function (Faker $faker) {
    $tanggal_mulai = Date::today()->subDay(rand(0, 720));
    $tanggal_selesai = (new Date($tanggal_mulai))->addYear(rand(1, 4));
    return [
        "nama" => ucwords($faker->sentence()),
        "tanggal_mulai" => $tanggal_mulai,
        "tanggal_selesai" => $tanggal_selesai,
        "dana" => rand(1, 20) * 1000000,
        "penanggung_jawab" => $faker->name,
    ];
});

$factory->afterCreating(App\ProgramPemerintah::class, function (ProgramPemerintah $programPemerintah, Faker $faker) {
    $bibits = Bibit::select('id')->get();
    $bibits = $bibits->shuffle()
        ->take(rand(1, $bibits->count()));

    foreach ($bibits as $bibit) {

        $programPemerintah->bibits()->attach($bibit, [
            "jumlah" => rand(1, 123) * 5
        ]);
    }
});
