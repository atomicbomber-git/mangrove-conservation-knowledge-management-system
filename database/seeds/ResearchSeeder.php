<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Category;
use App\Research;

class ResearchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::select('id')->get();
        $categories = Category::select('id')->get();

        factory(Research::class, 30)->make()->each(function($research) use($users, $categories) {
            $research->poster_id = $users->random()->id;
            $research->category_id = $categories->random()->id;
            
            $research
                ->addMedia(__DIR__ . '/example.pdf')
                ->preservingOriginal()
                ->toMediaCollection(config('media.collections.documents'));

                $research->save();
        });
    }
}
