<?php

namespace App\Http\Services;

use App\Http\Interfaces\DeliveryServiceInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class NovaPoshtaDeliveryService implements DeliveryServiceInterface
{
    private string $apiUrl = 'https://novaposhta.test/api';
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

    function sendDeliveryData(array $packageData, array $recipientData): Response
    {
        $requestData = [
            'customer_name' => $recipientData['name'],
            'phone_number' => $recipientData['phone'],
            'email' => $recipientData['email'],
            'sender_address' => config('delivery.sender_address'),
            'delivery_address' => $recipientData['address'],
        ];

        $response = Http::post('https://novaposhta.test/api/delivery', $requestData);

        return $response;
    }

    function updateDeliveryData(
        string $id,
        array $packageData,
        array $recipientData
    ): array {
        // TODO: Implement updateDeliveryData() method.
    }
}
