<?php

namespace engine\Factory\Database;

use engine\Contracts\Factory\Database\IDatabaseConnect;

class MySQLDBConnect implements IDatabaseConnect
{
    private $mysqli;

    public function __construct($host, $user, $password, $db)
    {
        $this->mysqli = new \mysqli($host, $user, $password, $db);

        if($this->mysqli->connect_error) {
            die('Ошибка подключения (' . $this->mysqli->connect_error . ') '
                . $this->mysqli->connect_error);
        }
    }

    public function connection()
    {
        return $this->mysqli;
    }
}