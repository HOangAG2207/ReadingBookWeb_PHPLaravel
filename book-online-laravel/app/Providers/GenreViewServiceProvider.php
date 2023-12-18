<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Genre;
class GenreViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $genre = Genre::orderBy('genre_name', 'asc')->where('genre_status', 1)->get();
            $view->with('genre', $genre);
        });
        //
    }
}
