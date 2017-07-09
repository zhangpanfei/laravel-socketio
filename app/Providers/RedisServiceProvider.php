<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RedisServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('User\Redis', function ($app) {
            $redis = new \Redis();
            $redis->connect('127.0.0.1',6379);
            return $redis;
        });
    }
}
