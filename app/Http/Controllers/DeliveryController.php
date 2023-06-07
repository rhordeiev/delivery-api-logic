<?php

namespace App\Http\Controllers;

use App\Http\Services\NovaPoshtaDeliveryService;
use App\Http\Services\UkrPoshtaDeliveryService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DeliveryController extends Controller
{
    // Метод, що відповідає за відправку даних про посилку
    public function sendDeliveryData(Request $request): JsonResponse
    {
        // Отримання потрібних даних про отримувача та посилку
        $packageData = $request->only(['width', 'height', 'length', 'weight']);
        $recipientData = $request->only(['name', 'phone', 'email', 'address']);
        $response = [];

        // В залежності від обраного сервіса здійснюється відправка даних про посилку
        /*
           Якщо є необхідність додати новий метод доставки достатньо створити
           новий сервісний клас, що імплементує DeliveryServiceInterface
        */
        if($request->delivery_service == 'nova_poshta') {
            $novaPoshtaService = new NovaPoshtaDeliveryService(env('NOVA_POSHTA_API_KEY'));
            $response = $novaPoshtaService->sendDeliveryData($packageData, $recipientData);
        } elseif($request->delivery_service == 'ukr_poshta') {
            $ukrPoshtaService = new UkrPoshtaDeliveryService(env('UKR_POSHTA_API_KEY'));
            $response = $ukrPoshtaService->sendDeliveryData($packageData, $recipientData);
        }

        // Перевірка на успішність запиту та відправлення відповідного повідомлення
        if ($response->successful()) {
            return response()->json(['message' => 'Delivery data was successfully sent']);
        } else {
            return response()->json(['error' => 'Something wrong happened on the chose delivery service'], 500);
        }
    }
}
