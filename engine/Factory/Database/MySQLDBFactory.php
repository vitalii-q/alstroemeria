<?php

namespace engine\Factory\Database;

use engine\Contracts\Factory\Database\IDatabaseConnect;
use engine\Contracts\Factory\Database\IDatabaseFactory;
use engine\Contracts\Factory\Database\IDatabaseQuery;
use engine\Helper\Get\Config;

class MySQLDBFactory implements IDatabaseFactory
{
    private $host, $user, $password, $db;

    public $table;

    public $data;

    public function __construct($table, $data)
    {
        $this->table = $table;
        $this->data = $data;

        $config = Config::class()->get('database'); // конфигурации базы данных

        $this->host = $config['host'];
        $this->db = $config['database'];
        $this->user = $config['username'];
        $this->password = $config['password'];
    }

    public function connect() : IDatabaseConnect
    {
        return new MySQLDBConnect(
            $this->host, $this->user, $this->password, $this->db
        );
    }

    public function query($query)
    {
        return new MySQLDBQuery($this->connect(), $query);
    }
}