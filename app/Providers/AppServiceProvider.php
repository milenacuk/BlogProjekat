<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Tag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() //kad god ucitas layouts.master uradi mi relaciju sa tagovima
    {
        view()->composer('layouts.master',function($view){
            $tags = Tag::has('posts')->get();

            $view->with('tags',$tags);  //prosledjujemo te tagove u view
        });
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
