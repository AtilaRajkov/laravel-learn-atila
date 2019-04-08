<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Model\Page;
//use App\Http\Controllers\Frontend\Page

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
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        $pagesTopLevel = Page::notdeleted()
                    ->toplevel()
                    ->active()
                    ->get();
        view()->share('pagesTopLevel', $pagesTopLevel);
        
//         view()->composer(['pages.show'], function($view){
//            $pagesTopLevel = Page::notdeleted()
//                    ->toplevel()
//                    ->active()
//                    ->get();
//            $view->with('pagesTopLevel', $pagesTopLevel);
//         });
        
    }
}
