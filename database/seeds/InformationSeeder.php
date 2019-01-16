<?php

use Illuminate\Database\Seeder;
use App\Information;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Information::create(['menu_title' => 'Pembibitan', 'title' => 'Pembibitan', 'content' => '']);
        Information::create(['menu_title' => 'Penanaman', 'title' => 'Penanaman', 'content' => '']);
        Information::create(['menu_title' => 'Perawatan', 'title' => 'Perawatan', 'content' => '']);
        Information::create(['menu_title' => 'Program Pemerintah', 'title' => 'Program Pemerintah', 'content' => '']);
        Information::create(['menu_title' => 'Peraturan Pemerintah', 'title' => 'Peraturan Pemerintah', 'content' => '']);
    }
}
