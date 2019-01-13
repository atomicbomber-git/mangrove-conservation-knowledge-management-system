<?php

use Illuminate\Database\Seeder;
use App\Mangrove;

class MangroveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mangrove::create(['key' => 'title', 'value' => '']);
        Mangrove::create(['key' => 'content', 'value' => '']);
    }
}
