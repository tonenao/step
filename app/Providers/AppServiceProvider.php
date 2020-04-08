<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Routing\UrlGenerator;

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
        $url->forceScheme('https');
        
        // if (in_array(config('app.env'), ['prd', 'stg'], true)) {
        //     $url->forceScheme('https');
        //   }
        // if (\App::environment('production')) {
        //     \URL::forceScheme('https');
        // }
        // if (request()->isSecure()) {
        //     \URL::forceScheme('https');
        // }
    
    }
}
