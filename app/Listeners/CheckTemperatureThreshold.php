<?php

namespace App\Listeners;

use App\Events\TemperatureStored;
use App\Events\TemperatureBelowThreshold;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CheckTemperatureThreshold implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(TemperatureStored $event)
    {
        $threshold = 15;

        if ($event->temperature < $threshold) {
            event(new TemperatureBelowThreshold($event->deviceId, $event->temperature));
        }
    }
}
