<?php

use Illuminate\Database\Seeder;
use App\ProgramPemerintah;

class ProgramPemerintahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function() {
            factory(ProgramPemerintah::class, 100)
                ->create();
        });
    }
}
