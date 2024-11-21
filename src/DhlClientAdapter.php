<?php

namespace serdaryigit\Laravel;

use serdaryigit\Dhl\Client;

class DhlClientAdapter
{
    /**
     * @var \serdaryigit\Dhl\Client
     */
    protected $client;

    /**
     * Construct a new api adapter instance.
     *
     * @param  \serdaryigit\Dhl\Client  $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return string
     */
    public function getAccountId()
    {
        return $this->client->getAccountId();
    }

    /**
     * @param  string  $value
     * @return \serdaryigit\Laravel\DhlClientAdapter
     */
    public function setAccountId(string $value)
    {
        $this->client->setAccountId($value);

        return $this;
    }

    /**
     * @param  string  $value
     * @return \serdaryigit\Laravel\DhlClientAdapter
     */
    public function setApiKey(string $value)
    {
        $this->client->setApiKey($value);

        return $this;
    }

    /**
     * @param  string  $value
     * @return \serdaryigit\Laravel\DhlClientAdapter
     */
    public function setUserId(string $value)
    {
        $this->client->setUserId($value);

        return $this;
    }

    /**
     * @return \serdaryigit\Dhl\Endpoints\Labels
     */
    public function labels()
    {
        return $this->client->labels;
    }

    /**
     * @return \serdaryigit\Dhl\Endpoints\Shipments
     */
    public function shipments()
    {
        return $this->client->shipments;
    }

    /**
     * @return \serdaryigit\Dhl\Endpoints\ServicePoints
     */
    public function servicePoints()
    {
        return $this->client->servicePoints;
    }

    /**
     * @return \serdaryigit\Dhl\Endpoints\TrackTrace
     */
    public function tracktrace()
    {
        return $this->client->tracktrace;
    }
}