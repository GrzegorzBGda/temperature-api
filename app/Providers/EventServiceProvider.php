<?php

namespace App\Providers;

use App\Events\TemperatureBelowThreshold;
use App\Events\TemperatureStored;
use App\Listeners\CheckTemperatureThreshold;
use App\Listeners\SendTemperatureWarningEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        TemperatureStored::class => [
            CheckTemperatureThreshold::class,
        ],
        TemperatureBelowThreshold::class => [
            SendTemperatureWarningEmail::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        parent::boot();
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
