<?php

use Faker\Generator as Faker;
use Jenssegers\Date\Date;

$factory->define(App\ProgramPemerintah::class, function (Faker $faker) {
    $tanggal_mulai = Date::today()->subDay(rand(0, 720));
    $tanggal_selesai = (new Date($tanggal_mulai))->addYear(rand(1, 4));
    return [
        "nama" => ucwords($faker->sentence()),
        "tanggal_mulai" => $tanggal_mulai,
        "tanggal_selesai" => $tanggal_selesai,
        "dana" => rand(1, 20) * 1000000,
        "penanggung_jawab" => $faker->name,
        "nama_instansi" => $faker->company,
        "nama_instansi_penerima" => $faker->company,
        "penanggung_jawab_penerima" => $faker->name,
        "bentuk" => $faker->realText,
        "hasil" => $faker->realText,
        "persentase_hasil" => rand(0, 10000) / 100,
    ];
});
