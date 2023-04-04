<?php

namespace App\Listeners;

use App\Events\TemperatureBelowThreshold;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendTemperatureWarningEmail implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(TemperatureBelowThreshold $event)
    {
        $email = 'bielski.grzegorz@wp.pl'; // Pobierz adres e-mail właściciela na podstawie $event->deviceId

        $subject = 'Temperature Warning';
        $message = "The temperature in the device '{$event->deviceId}' has dropped below the threshold. Current temperature: {$event->temperature}°C";

        Mail::raw($message, function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });
    }
}
