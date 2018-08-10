<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $data = DB::table('category')->get();
        $categories = [];
        $total = [];
        foreach($data as $item){
            $total['name'] = $item->cat_name;
            $total['id'] = $item->id;
            $categories[] = $total;
        }

        view()->share('categoriesOfProducts', $categories);
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
