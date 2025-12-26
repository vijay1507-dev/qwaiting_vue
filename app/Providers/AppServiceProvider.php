<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(function (SocialiteWasCalled $event) {
            $event->extendSocialite('microsoft', \SocialiteProviders\Microsoft\Provider::class);
        });

        // Register email notification event listeners
        Event::listen(
            \Illuminate\Mail\Events\MessageSending::class,
            \App\Listeners\LogEmailNotificationFailure::class
        );

        Event::listen(
            \Illuminate\Mail\Events\MessageSent::class,
            \App\Listeners\LogEmailNotification::class
        );

        Event::listen(
            \Illuminate\Notifications\Events\NotificationSent::class,
            \App\Listeners\LogNotificationSent::class
        );
    }
}
