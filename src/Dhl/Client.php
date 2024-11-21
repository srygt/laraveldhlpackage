<?php

namespace serdaryigit\Dhl;

class Client
{
    protected $accountId;
    protected $apiKey;
    protected $userId;

    public $labels;
    public $shipments;
    public $servicePoints;
    public $tracktrace;

    public function __construct()
    {
        $this->labels = new Endpoints\Labels();
        $this->shipments = new Endpoints\Shipments();
        $this->servicePoints = new Endpoints\ServicePoints();
        $this->tracktrace = new Endpoints\TrackTrace();
    }

    public function getAccountId()
    {
        return $this->accountId;
    }

    public function setAccountId(string $accountId)
    {
        $this->accountId = $accountId;
    }

    public function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function setUserId(string $userId)
    {
        $this->userId = $userId;
    }
}