<?php
namespace app\Engine\DIModules\Database;

use app\Engine\Helper\Get;

class Connection
{
    private $link;

    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return void
     * @throws \Exception
     */
    private function connect()
    {
        $config = Get::config('database'); // конфигурации базы данных

        try {
            $link = 'mysql:host='.$config['host'].';dbname='.$config['database'].';charset='.$config['charset'];

            $this->link = new \PDO($link, $config['username'], $config['password']);
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }

    public function query($query, $values = [], $statement = \PDO::FETCH_OBJ)
    {
        $sql = $this->link->prepare($query); // подготовка запроса

        $sql->execute($values); // выполнение запроса со значениями

        $result = $sql->fetchAll($statement); // указываем в каком виде получем

        return $result;
    }

    public function lastInsertID()
    {
        return $this->link->lastInsertId(); // PDO возвращает id последнего элемента
    }
}