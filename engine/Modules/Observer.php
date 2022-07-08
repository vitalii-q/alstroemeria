<?php

namespace engine\Modules;

use app\Providers\EventServiceProvider;
use engine\Contracts\iEvent;
use engine\Contracts\iListener;

class Observer // ПП Observer / Наблюдатель
{
    /**
     * This class
     *
     * @var object
     */
    private static $class;

    /**
     * listeners
     *
     * @var array
     */
    protected static $listeners = [];

    /**
     * Getting and adding listeners, dynamic call prohibition
     */
    private function __construct() {
        $eventProvider = new EventServiceProvider();

        foreach ($eventProvider->getListeners() as $event => $events) {
            foreach ($events as $listener) {
                self::$listeners[$event][] = new $listener();
            }
        }
    }

    /**
     * Clone prohibition
     *
     * @return void
     */
    private function __clone() {}

    /**
     * Call self class
     *
     * @return Observer|object
     */
    public static function class()
    {
        if(!self::$class) {
            self::$class = new self();
        }

        return self::$class;
    }

    /**
     * Dispatch the event listeners
     *
     * @param iEvent $event
     * @return void
     */
    public static function event(iEvent $event)
    {
        foreach (self::$listeners as $eventClassName => $listenerClasses) {
            if(get_class($event) == $eventClassName) {
                self::listenersDispatch($listenerClasses, $event);
            }
        }
    }

    /**
     * Handle list listeners
     *
     * @param $listenerClasses
     * @param $event
     * @return void
     */
    protected static function listenersDispatch($listenerClasses, $event) {
        foreach ($listenerClasses as $listener) {
            self::handle($listener, $event);
        }
    }

    /**
     * Handle listener
     *
     * @param iListener $listener
     * @param $event
     * @return void
     */
    protected static function handle(iListener $listener, $event)
    {
        $listener->handle($event);
    }
}