<?php

use Illuminate\Database\Seeder;

class DefinisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function() {
            factory(App\Definisi::class, 300)
                ->create();
        });
    }
}
