<?php

namespace App\Http\Services;

use Illuminate\Http\Client\Response;
use App\Http\Interfaces\DeliveryServiceInterface;

class UkrPoshtaDeliveryService implements DeliveryServiceInterface
{
    private string $apiUrl = 'https://ukrposhta.test/api';
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    function createAddress(array $addressInfo): array
    {
        // TODO: Implement createAddress() method.
    }

    function getAddress(array $addressInfo): array
    {
        // TODO: Implement getAddress() method.
    }

    function deleteAddress(array $addressInfo): array
    {
        // TODO: Implement deleteAddress() method.
    }

    function getWarehouse(array $warehouseInfo): array
    {
        // TODO: Implement getWarehouse() method.
    }

    function createCounteragent(array $addressInfo): array
    {
        // TODO: Implement createCounteragent() method.
    }

    function updateCounteragent(array $addressInfo): array
    {
        // TODO: Implement updateCounteragent() method.
    }

    function deleteCounteragent(array $addressInfo): array
    {
        // TODO: Implement deleteCounteragent() method.
    }

    function sendDeliveryData(
        array $packageData,
        array $recipientData
    ): Response {
        // TODO: Implement sendDeliveryData() method.
    }

    function updateDeliveryData(
        string $id,
        array $packageData,
        array $recipientData
    ): array {
        // TODO: Implement updateDeliveryData() method.
    }
}
