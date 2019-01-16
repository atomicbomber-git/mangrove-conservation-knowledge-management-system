<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Blade::directive('format_datetime', function ($datetime) {
            return "<?php echo (isset($datetime) ? ($datetime)->format('d/m/Y H:i:s') : ''); ?>";
        });

        Blade::directive('localized_date', function ($date) {
            return "<?php echo isset($date) ? (new Date($date))->format('l, j F Y') : '' ?>";
        });

        View::composer('shared.navbar', function ($view) {
            $view->with('information', \App\Information::select('id', 'menu_title')->get());
        });
    }
}
