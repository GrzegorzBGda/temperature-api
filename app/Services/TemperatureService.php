<?php

namespace App\Services;

use App\Events\TemperatureStored;
use App\Models\Temperature;

class TemperatureService
{
    public function store(array $data): Temperature
    {
        $temperature = Temperature::create($data);

        event(new TemperatureStored($data['device_id'], $data['temperature']));

        return $temperature;
    }
}
