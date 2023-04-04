<?php

namespace App\Http\Controllers;

use App\Http\Requests\TemperatureRequest;
use App\Services\TemperatureService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreTemperatureController extends Controller
{
    public function __construct(private TemperatureService $temperatureService)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $this->temperatureService->store(['device_id' => 1, 'temperature' => 21, 'date' => now()]);

        return response()->json(
            ['message' => 'Temperature saved successfully.'],
            201
        );
    }
}

