<?php

/*
 * This file is part of the whitexiong/weather.
 *
 * (c) whitexiong<986247535@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Whitexiong\Weather;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Weather::class, function () {
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
