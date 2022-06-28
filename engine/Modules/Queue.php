<?php

namespace engine\Modules;

class Queue
{
    private static $class;

    private function __construct() {}

    private function __clone() {}

    public static function dispatch() {
        if(is_null(self::$class)) {
            self::$class = new self;
        }

        return self::$class;
    }
}