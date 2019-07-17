<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (App\User::class, 1)
            ->create([
                "username" => "umum",
                "password" => Hash::make("umum"),
                "type" => App\User::TYPE_REGULAR,
            ]);

        factory (App\User::class, 1)
            ->create([
                "username" => "peneliti",
                "password" => Hash::make("peneliti"),
                "type" => App\User::TYPE_REGULAR,
            ]);

        factory(App\User::class, 30)->create();
    }
}
