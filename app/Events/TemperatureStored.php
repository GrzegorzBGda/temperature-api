<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TemperatureStored
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $deviceId;
    public int $temperature;

    public function __construct(string $deviceId, int $temperature)
    {
        $this->deviceId = $deviceId;
        $this->temperature = $temperature;
    }
}
