<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Category;
use App\Research;
use Illuminate\Support\Facades\DB;

class ResearchSeeder extends Seeder
{
    const POTENTIAL_KEYWORDS = [
        'bakau', 'nipah', 'mangrove', 'daun', 'akar'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            $users = User::select('id', 'first_name', 'last_name')->get()->keyBy('id');
            $categories = Category::select('id')->get();

            factory(Research::class, 50)->make()->each(function ($research) use ($users, $categories) {
                $poster = $users->random();

                $research->poster_id = $poster->id;
                $research->category_id = $categories->random()->id;

                $potential_keyword = ucfirst(collect(self::POTENTIAL_KEYWORDS)->random());
                $research->description = $potential_keyword . ' ' . $research->description;
                $research->title = $potential_keyword . ' ' . $research->title;
            
                $research
                    ->addMedia(__DIR__ . '/example.pdf')
                    ->preservingOriginal()
                    ->toMediaCollection(config('media.collections.documents'));

                $research->save();

                $user_pool = $users->map(function ($item) {
                    return $item;
                });

                $research->authors()->create($poster->only(['first_name', 'last_name']));
                $user_pool->forget($poster->id);

                $n_authors = rand(1, 3);
                for ($i = 0; $i < $n_authors; ++$i) {
                    $author = $user_pool->random();
                    $research->authors()->create($author->only(['first_name', 'last_name']));
                    $user_pool->forget($author->id);
                }
            });
        });
    }
}
