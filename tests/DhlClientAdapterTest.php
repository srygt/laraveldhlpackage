<?php

namespace serdaryigit\Laravel\Tests;

use serdaryigit\DhlParcel\Client;
use serdaryigit\Laravel\DhlClientAdapter;

class DhlClientAdapterTest extends TestCase
{
    /**
     * @var \serdaryigit\Dhl\Client
     */
    protected $client;

    /**
     * @var \serdaryigit\Laravel\DhlClientAdapter
     */
    protected $adapter;

    protected function setUp(): void
    {
        $this->client = new Client;
        $this->adapter = new DhlClientAdapter($this->client);
    }

    /** @test */
    public function it_adapts_the_endpoints()
    {
        $endpoints = [
            'labels',
            'shipments',
            'tracktrace',
            'servicePoints',
        ];

        foreach ($endpoints as $endpoint) {
            $this->assertAdaptedEndpoint($this->client, $this->adapter, $endpoint);
        }
    }

    /** @test */
    public function it_can_get_the_account_id()
    {
        $this->assertNull($this->adapter->getAccountId());
    }

    /** @test */
    public function it_can_set_the_account_id()
    {
        $this->assertInstanceOf(DhlClientAdapter::class, $this->adapter->setAccountId('1234'));
    }

    /** @test */
    public function it_can_set_the_api_key()
    {
        $this->assertInstanceOf(DhlClientAdapter::class, $this->adapter->setApiKey('1234'));
    }

    /** @test */
    public function it_can_set_the_user_id()
    {
        $this->assertInstanceOf(DhlParcelClientAdapter::class, $this->adapter->setUserId('1234'));
    }

    /**
     * Assert that the adapter endpoint method returns the same as the client attribute.
     * For example: $adapter->shipments() should be equal to $client->shipments.
     *
     * @param  \serdaryigit\DhlParcel\Client  $client
     * @param  \serdaryigit\Laravel\DhlClientAdapter  $adapter
     * @param  string $endpoint
     * @return void
     *
     * @throws \PHPUnit\Framework\ExceptionWrapper
     */
    protected function assertAdaptedEndpoint($client, $adapter, $endpoint)
    {
        $this->assertEquals($client->$endpoint, $adapter->$endpoint());
    }
}