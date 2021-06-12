<?php

namespace App\Providers;

use App\Events\MemberRequestEvent;
use App\Events\NewApplicantCreatedEvent;
use App\Listeners\MemberRequestListener;
use App\Listeners\NewApplicantCreatedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        MemberRequestEvent::class => [
            MemberRequestListener::class,
        ],
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        NewApplicantCreatedEvent::class => [
            NewApplicantCreatedListener::class,
        ],
        
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
