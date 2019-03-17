<?php

namespace Farojas85\checkrole;

use Blade;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class CheckroleServiceProvider extends ServiceProvider
{
    /**
     * Indicates of loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the service provider.
     *
     * @return null
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/checkrole.php' => config_path('checkrole.php'),
        ]);

        if (version_compare(Application::VERSION, '5.3.0', '<')) {
            $this->publishes([
                __DIR__ . '/../migrations' => $this->app->databasePath() . '/migrations',
            ], 'migrations');
        } else {
            if (config('checkrole.run-migrations', true)) {
                $this->loadMigrationsFrom(__DIR__ . '/../migrations');
            }
        }

        $this->registerBladeDirectives();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/checkrole.php', 'checkrole'
        );

        $this->app->singleton('checkrole', function ($app) {
            $auth = $app->make('Illuminate\Contracts\Auth\Guard');

            return new \Caffeinated\Shinobi\Shinobi($auth);
        });
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['checkrole'];
    }
}
