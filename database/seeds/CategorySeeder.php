<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Pembibitan']);
        Category::create(['name' => 'Penanaman']);
        Category::create(['name' => 'Perawatan']);
        Category::create(['name' => 'Penyakit']);
        Category::create(['name' => 'Lain-Lain']);
    }
}
