<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\Article;
use App\Research;
use App\Policies\ResearchPolicy;
use App\Pengalaman;
use App\Definisi;
use App\Policies\PengalamanPolicy;
use App\Policies\ArticlePolicy;
use App\Policies\DefinisiPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Research::class => ResearchPolicy::class,
        Pengalaman::class => PengalamanPolicy::class,
        Article::class => ArticlePolicy::class,
        Definisi::class => DefinisiPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Management for admin
        Gate::define('administrate-home', function ($user) {
            return $user->getOriginal('type') == 'admin';
        });

        Gate::define('administrate-users', function ($user) {
            return $user->getOriginal('type') == 'admin';
        });

        Gate::define('delete-user', function ($user, User $model) {
            return $user->getOriginal('type') == 'admin' && $user->id != $model->id;
        });

        Gate::define('administrate-articles', function ($user) {
            return $user->getOriginal('type') == 'admin';
        });

        Gate::define('administrate-categories', function ($user) {
            return $user->getOriginal('type') == 'admin';
        });

        Gate::define('administrate-researches', function ($user) {
            return $user->getOriginal('type') == 'admin';
        });

        // Article management for non-admins
        Gate::define('manage-articles', function ($user) {
            return $user->getOriginal('type') != 'admin';
        });

        Gate::define('read-article', function (?User $user, Article $article) {
            if ($article->getOriginal('status') != 'approved') {
                return $user->id == $article->poster_id || $user->getOriginal('type') == 'admin';
            }

            return TRUE;
        });

        Gate::define('edit-article', function ($user, Article $article) {
            if ($user->getOriginal('type') == 'admin') {
                return TRUE;
            }

            if ($user->id == $article->poster_id && $article->getOriginal('status') != 'approved') {
                return TRUE;
            }

            return FALSE;
        });

        Gate::define('delete-article', function ($user, Article $article) {
            if ($user->getOriginal('type') == 'admin') {
                return TRUE;
            }

            if ($user->id == $article->poster_id && $article->getOriginal('status') != 'approved') {
                return TRUE;
            }

            return FALSE;
        });

        Gate::define('manage-researches', function ($user) {
            return $user->getOriginal('type') == 'researcher';
        });

        Gate::define('view-researches', function ($user) {
            return $user->getOriginal('type') == 'regular' || $user->getOriginal('type') == 'researcher';
        });
    }
}
