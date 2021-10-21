<?php

namespace App\Providers;

use App\Events\UserEvent;
use App\Listeners\LastLoginUpdateListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use SocialiteProviders\Facebook\FacebookExtendSocialite;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\VKontakte\VKontakteExtendSocialite;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserEvent::class => [
            LastLoginUpdateListener::class,
        ],
        SocialiteWasCalled::class => [
            FacebookExtendSocialite::class.'@handle',
            VKontakteExtendSocialite::class.'@handle',
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
