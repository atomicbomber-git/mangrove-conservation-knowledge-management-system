<?php

use Illuminate\Database\Seeder;

class BibitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function() {
            factory(App\Bibit::class, 100)
                ->create();
        });
    }
}
