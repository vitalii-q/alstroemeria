<?php
namespace app\Providers;

use app\Events\NewUser;
use app\Listeners\NewUserGreetingSiteListener;
use app\Listeners\NewUserGreetingMailListener;

class EventServiceProvider
{
    public $listeners = [
        NewUser::class => [
            NewUserGreetingSiteListener::class,
            NewUserGreetingMailListener::class
        ]
    ];

    public function getListeners()
    {
        return $this->listeners;
    }
}