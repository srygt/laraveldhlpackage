<?php

namespace serdaryigit\Laravel\Tests;

use serdaryigit\Dhl\Client;
use serdaryigit\Laravel\DhlClientAdapter;
use serdaryigit\Laravel\Facades\Dhl as DhlFacade;

class DhlServiceProviderTest extends TestCase
{
    /** @test */
    public function it_can_resolve_the_dhl__client()
    {
        $this->assertInstanceOf(Client::class, app('dhl'));
    }

    /** @test */
    public function it_can_resolve_the_dhl__client_adapter()
    {
        $this->assertInstanceOf(DhlClientAdapter::class, app('dhl.adapter'));
    }

    /** @test */
    public function it_can_use_the_facade()
    {
        $this->assertNull(DhlFacade::getAccountId());
    }
}