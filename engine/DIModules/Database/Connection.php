<?php
namespace engine\DIModules\Database;

use engine\Helper\Get\Config;
use engine\Modules\Log;

class Connection
{
    /**
     * @var
     */
    private $link;

    /**
     * Connecting to the database when the class is called
     *
     * @throws \Exception
     */
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
        $config = Config::class()->get('database'); // конфигурации базы данных
        $db_connection = \engine\Helper\Env::get('DB_CONNECTION', 'mysql');

        try {
            if ($db_connection == 'mysql') {
                $link = $db_connection.':host='.$config['host'].';dbname='.$config['database'].';charset='.$config['charset'];
            } else {
                $link = $db_connection.':host='.$config['host'].';dbname='.$config['database'];
            }

            $this->link = new \PDO($link, $config['username'], $config['password']);
        } catch (\PDOException $e) {
            Log::class('sql')->logging($e->getMessage());
            print "Error!: " . $e->getMessage();
            die();
        }
    }

    /**
     * Query execution function
     *
     * @param $query
     * @param $values
     * @param $statement
     * @return mixed
     */
    public function query($query, $values = [], $statement = \PDO::FETCH_OBJ)
    {
        $sql = $this->link->prepare($query); // подготовка запроса

        $sql->execute($values); // выполнение запроса со значениями

        $result = $sql->fetchAll($statement); // указываем в каком виде получем

        return $result;
    }

    /**
     * Getting the id of the last database query item
     *
     * @return mixed
     */
    public function lastInsertID()
    {
        return $this->link->lastInsertId(); // PDO возвращает id последнего элемента
    }
}