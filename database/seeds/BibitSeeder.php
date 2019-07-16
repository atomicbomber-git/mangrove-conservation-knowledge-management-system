<?php

use Illuminate\Database\Seeder;
use App\Bibit;

class BibitSeeder extends Seeder
{
    const NAMA_BIBITS = [
        "Mangrove A", "Mangrove B", "Mangrove C", "Mangrove D", "Mangrove E",
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function() {
            foreach (self::NAMA_BIBITS as $nama_bibit) {
                Bibit::create([
                    "nama" => $nama_bibit,
                ]);
            }
        });
    }
}
