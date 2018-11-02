<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::select('id')->get();

        factory(Article::class, 30)->make()->each(function($article) use($users) {
            $article->poster_id = $users->random()->id;
            $article->save();
        });
    }
}
