<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DefinisiSeeder extends Seeder
{
    private $faker;

    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo $this->faker->name;

        DB::transaction(function() {
            factory(App\Definisi::class, 50)
                ->create()
                ->each(function (Definisi $definisi) {
                    $definisi->addMedia(imagecreate(100, 100));
                });
        });
    }
}
