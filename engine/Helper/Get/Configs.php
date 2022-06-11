<?php

namespace engine\Helper\Get;

use engine\Helper\Get;

class Configs // ПП singleton
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
     * @var null
     */
    private static $instance = null;

    /**
     * Restricts the call to the self class
     *
     * @throws \Exception
     */
    private function __construct() { // приватный конструктор ограничивает реализацию getInstance ()
        $this->database = Get::config('database'); // конфигурации базы данных
        $this->architecture = Get::config('architecture'); // архитектура приложения
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
     * @return Configs|null
     */
    static public function getInstance()
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
            case ('arch'): return $this->architecture;
            case('database'): return $this->database;
        }
    }
}