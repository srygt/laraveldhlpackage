<?php

namespace serdaryigit\Laravel\Tests;

use serdaryigit\DhlParcel\Client;
use serdaryigit\Laravel\Facades\Dhl as DhlFacade;
use serdaryigit\Laravel\DhlParcelClientAdapter;

class DhlServiceTest extends TestCase
{
    /** @test */
    public function it_can_resolve_the_dhl_parcel_client()
    {
        $this->assertInstanceOf(Client::class, app('dhlparcel'));
    }

    /** @test */
    public function it_can_resolve_the_dhl_parcel_client_adapter()
    {
        $this->assertInstanceOf(DhlParcelClientAdapter::class, app('dhlparcel.adapter'));
    }

    /** @test */
    public function it_can_use_the_facade()
    {
        $this->assertNull(DhlFacade::getAccountId());
    }
}