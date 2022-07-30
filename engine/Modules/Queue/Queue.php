<?php

namespace engine\Modules\Queue;

class Queue
{
    private static $class;

    private static $worker;

    private function __construct() {}

    private function __clone() {}

    public static function dispatch($job) { // функционал app/Jobs не настроен TODO: закончить
        if(is_null(self::$class)) {
            self::$class = new self;
        }

        if (is_null(self::$worker)) {
            $mediator = new QueueMediator();
            self::$worker = $mediator->getWorker();
        }

        self::$worker->checkWorker(); // проверка подключения воркера

        self::setJob($job);

        return self::$class;
    }

    public static function setJob($job)
    {
        self::$worker->setJob($job);
    }
}