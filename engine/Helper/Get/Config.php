<?php

namespace engine\Helper\Get;

use engine\Helper\Get;

class Config // ПП singleton
{
    /**
     * @var mixed
     */
    private $database;

    /**
     * @var mixed
     */
    private $architecture;

    /**
     * @var mixed
     */
    private $queue;

    /**
     * @var null
     */
    private static $instance = null;

    /**
     * Restricts the call to the self class
     *
     * @throws \Exception
     */
    private function __construct() { // приватный конструктор ограничивает реализацию class()
        $this->database = Get::config('database'); // конфигурации базы данных
        $this->architecture = Get::config('architecture'); // архитектура приложения
        $this->queue = Get::config('queue'); // конфигурации очередей
    }

    /**
     * Restricts the cloning of an object of a self class
     *
     * @return void
     */
    protected function __clone() {} // ограничивает клонирование объекта

    /**
     * Getting self class object
     *
     * @return Config|null
     */
    static public function class()
    {
        if(is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Getting config files
     *
     * @param $config
     * @return mixed|void
     */
    public function get($config)
    {
        switch ($config) {
            case('database'): return $this->database;
            case('arch'): return $this->architecture;
            case('queue'): return $this->queue;
        }
    }
}