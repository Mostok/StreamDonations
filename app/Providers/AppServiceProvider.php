<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Configuration;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('mp3_extension', function($attribute, $value, $parameters, $validator) {
            return (!empty($value->getClientOriginalExtension()) && ($value->getClientOriginalExtension() == 'mp3'));
        });
        
        // Configurations
        if (php_sapi_name() !== 'cli')
            Configuration::reload();

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
