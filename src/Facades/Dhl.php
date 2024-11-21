<?php

namespace serdaryigit\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class Dhl extends Facade
{
    /**
     * Get the registered name of the component in the service container.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'dhl.adapter';
    }
}