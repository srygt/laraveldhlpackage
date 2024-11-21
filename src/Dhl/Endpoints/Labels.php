<?php

namespace serdaryigit\Dhl\Endpoints;

class Labels
{
    public function createLabel(array $shipmentDetails)
    {
        // Implement label creation logic here
        return "Label created for shipment: " . json_encode($shipmentDetails);
    }
}