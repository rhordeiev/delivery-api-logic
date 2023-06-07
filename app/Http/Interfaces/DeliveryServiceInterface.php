<?php

namespace App\Http\Interfaces;

use \Illuminate\Http\Client\Response;

// Загальний інтерфейс для всіх сервісів доставки
// В ньому вказані методи, що необхідно реалізувати класам, що його імплементують
/*
   Опрацювавши API деяких сервісів доставки, можна на майбутнє, окрім методу відправки
   даних, додати методи для роботи із адресою. Перед тим, як створити відправлення,
   наприклад, потрібно ще додати id адреси, куди доставляється посилка.
   Таким чином ще знадобляться методи для пошуку відділення, для керуванням
   контрагентами, метод для зміни даних про посилку.
*/
interface DeliveryServiceInterface
{
    function createAddress(array $addressInfo): array;
    function getAddress(array $addressInfo): array;
    function deleteAddress(array $addressInfo): array;
    function getWarehouse(array $warehouseInfo): array;
    function createCounteragent(array $addressInfo): array;
    function updateCounteragent(array $addressInfo): array;
    function deleteCounteragent(array $addressInfo): array;
    function sendDeliveryData(array $packageData, array $recipientData): Response;
    function updateDeliveryData(string $id, array $packageData, array $recipientData): array;
}
