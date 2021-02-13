<?php

namespace App\Providers;

use App\Models\Comment;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return
     */
    public function boot()
    {
        View::composer('admin.temp', function ($view) {
            $countComment = Comment::where('seen', 0)->count();
            $view->with(['temp' => $countComment]);
        });

    }
}
