<?php

use Illuminate\Database\Seeder;
use App\Pengalaman;

class PengalamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function() {
            factory(Pengalaman::class, 100)->create();
        });
    }
}
