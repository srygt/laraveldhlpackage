<?php

namespace serdaryigit\Laravel;

use serdaryigit\Dhl\Client;
use Psr\Container\ContainerInterface;
use Illuminate\Support\ServiceProvider;
use serdaryigit\Laravel\DhlClientAdapter;

class DhlServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/dhl.php', 'dhl');

        $this->registerDhlClient();
        $this->registerDhlAdapter();

        $this->registerPublishing();
    }

    /**
     * Register the DHL  Client.
     *
     * @return void
     */
    protected function registerDhlClient()
    {
        $this->app->singleton(Client::class, function () {
            return (new Client)->setUserId(config('dhl.id'))->setApiKey(config('dhl.secret'));
        });

        $this->app->alias(Client::class, 'dhl');
    }

    /**
     * Register the DHL  Client Adapter.
     *
     * @return void
     */
    protected function registerDhlAdapter()
    {
        $this->app->singleton(DhlClientAdapter::class, function (ContainerInterface $container) {
            return new DhlClientAdapter($container->get('dhl'));
        });

        $this->app->alias(DhlClientAdapter::class, 'dhl.adapter');
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/dhl.php' => config_path('dhl.php'),
            ], 'dhl-config');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'dhl',
            'dhl.adapter',
        ];
    }
}