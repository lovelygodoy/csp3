<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Schema;
use App\Post;

class AppServiceProvider extends ServiceProvider


{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    

        View::composer('partials.sidebar', function ($view){

            $view->with('archives', \App\Post::archives());
        });

       
        Schema::defaultStringLength(191);

       
    }



    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
