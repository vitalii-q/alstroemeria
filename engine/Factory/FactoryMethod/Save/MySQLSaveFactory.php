<?php

namespace engine\Factory\FactoryMethod\Save;

use engine\Contracts\Factory\Save\ISaveFactory;
use engine\Factory\FactoryMethod\Save\Type\MySQLSave;
use engine\Helper\Get\Config;

class MySQLSaveFactory implements ISaveFactory
{
    private $host, $db, $user, $password;

    public function __construct()
    {
        $config = Config::class()->get('database'); // конфигурации базы данных

        $this->host = $config['host'];
        $this->db = $config['database'];
        $this->user = $config['username'];
        $this->password = $config['password'];
    }

    public function createSaver(): MySQLSave
    {
        return new MySQLSave($this->host, $this->user, $this->password, $this->db);
    }
}