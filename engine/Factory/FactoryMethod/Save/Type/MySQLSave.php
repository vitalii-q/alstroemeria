<?php

namespace engine\Factory\FactoryMethod\Save\Type;

use engine\Contracts\Factory\Save\ISave;

class MySQLSave implements ISave
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

    public function save($name, $price)
    {
        $result = $this->mysqli->query("INSERT INTO `products` (`name`, `price`) VALUES ('$name', '$price')"); // запрос mysql
    }
}