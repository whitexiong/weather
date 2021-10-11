<?php

namespace White\Weather;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Weather::class, function(){
            return new Weather(config('services.weather.key'));
        });

        $this->app->alias(Weather::class, 'weather');

        //
//        $this->app->publishes([
//            __DIR__.'/path/to/assets' => public_path('vendor/courier'),
//        ], 'public');
    }

    public function provides()
    {
        return [Weather::class, 'weather'];
    }
}