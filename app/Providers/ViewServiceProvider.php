<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use phpDocumentor\Reflection\DocBlock\Tag;

class ViewServiceProvider extends ServiceProvider
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

    public function boot()
    {
        if (!request()->is('admin/*')) {
            view()->composer('*', function ($view) {
                if (!Cache::has('shop_categories_menu')) {
                    Cache::forever('shop_categories_menu', Category::tree());
                }
                $shop_categories_menu = Cache::get('shop_categories_menu');

                if (!Cache::has('shop_tags_menu')) {
                    Cache::forever('shop_tags_menu', Tag::whereStatus(true)->get());
                }
                $shop_tags_menu = Cache::get('shop_tags_menu');

                $view->with([
                    'shop_categories_menu' => $shop_categories_menu,
                    'shop_tags_menu' => $shop_tags_menu,
                ]);
            });
        }
    }
}
