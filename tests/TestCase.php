<?php

namespace serdaryigit\Laravel\Tests;

use serdaryigit\Laravel\DhlServiceProvider;

abstract class TestCase
{
    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('dhl.id', '123456');
        $app['config']->set('dhl.secret', 'DHL_SECRET_TOKEN');
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            DhlServiceProvider::class,
        ];
    }
}