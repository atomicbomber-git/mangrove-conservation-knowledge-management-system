<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\FormatterInterface;
use App\Helpers\Formatter;

class FormatterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(FormatterInterface::class, Formatter::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
