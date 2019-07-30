<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(ResearchSeeder::class);
        $this->call(SlideSeeder::class);
        $this->call(InformationSeeder::class);
        $this->call(ProgramPemerintahSeeder::class);
        $this->call(PengalamanSeeder::class);
        $this->call(BibitSeeder::class);
    }
}
