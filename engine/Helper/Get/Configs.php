<?php

namespace engine\Helper\Get;

use engine\Helper\Get;

class Configs // ПП singleton
{
    private $database;

    private $architecture;

    private static $instance = null;

    private function __construct() { // приватный конструктор ограничивает реализацию getInstance ()
        $this->database = Get::config('database'); // конфигурации базы данных
        $this->architecture = Get::config('architecture'); // архитектура приложения
    }

    protected function __clone() {} // ограничивает клонирование объекта

    static public function getInstance()
    {
        if(is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function get($config)
    {
        switch ($config) {
            case ('arch'): return $this->architecture;
            case('database'): return $this->database;
        }
    }
}