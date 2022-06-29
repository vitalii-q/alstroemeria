<?php

namespace engine\Modules\Queue;

class Queue
{
    private static $class;

    private static $worker;

    private function __construct() {}

    private function __clone() {}

    public static function dispatch($job) {
        if(is_null(self::$class)) {
            self::$class = new self;
        }

        if (is_null(self::$worker)) {
            $mediator = new QueueMediator();
            self::$worker = $mediator->getWorker();
        }

        self::setJob($job);

        return self::$class;
    }

    public static function setJob($job)
    {
        self::$worker->setJob($job);
    }
}