<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Schema;
use Illuminate\Support\Facades\URL;

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
        Carbon::setLocale(config('app.locale'));

        $proxy_url    = getenv('PROXY_URL');
        $proxy_schema = getenv('PROXY_SCHEMA');
        
        if(!empty($proxy_url)) {
            URL::forceRootUrl($proxy_url);
        }

        if(!empty($proxy_schema)) {
            URL::forceScheme($proxy_schema);
        }

        
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
