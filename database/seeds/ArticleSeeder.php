<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Article;
use App\Category;

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
        $categories = Category::select('id')->get();

        factory(Article::class, 30)->make()->each(function($article) use($users, $categories) {
            $article->poster_id = $users->random()->id;
            $article->category_id = $categories->random()->id;
            $article->save();
        });
    }
}
