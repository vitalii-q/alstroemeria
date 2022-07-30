<?php

namespace engine\Database;

use engine\DIModules\Database\Connection;

final class StaticQueryHandler
{
    /**
     * @var string $sql SQL-запрос.
     */
    private $query;

    /**
     * @var
     */
    private $table;

    /**
     * Query builder constructor
     */
    public function __construct($table)
    {
        $this->table = $table;
        $this->query = '';
    }

    /**
     * @param string $select
     * @return void
     */
    public function get($select = '*')
    {
        $this->query .= 'SELECT ' . $select . ' FROM ' . $this->table;
    }

    /**
     * @param $field
     * @param mixed $condition
     * @param $operator
     * @return void
     */
    public function where($field, $value, $operator = '=')
    {
        $this->query .= ' WHERE ' . $field. $operator . '"' . $value . '"';
    }

    /**
     * TODO: добавить массовое добавление
     *
     * @param $fields
     * @return void
     */
    public function insert($fields)
    {
        $this->query .= 'INSERT INTO ' . $this->table . '(';
        $keys = ''; $values = '';

        for ($i = 0; $i < count($fields); $i++) {
            $keys .= array_keys($fields)[$i]; // достаем ключи массива
            $values .= "'" . array_values($fields)[$i] . "'"; // нумеруем массив и достаем его значения
            if($i < count($fields)-1) {
                $keys .= ', '; $values .= ', ';
            }
        }
        $this->query .= $keys . ') values (' . $values . ')';
    }

    /**
     * @param $id
     * @param $fields
     * @return void
     */
    public function update($id, $fields)
    {
        $this->query .= 'UPDATE ' . $this->table . ' SET ';

        $i = 0; foreach ($fields as $key => $value) {
            $this->query .= $key . ' = "' . $value . '" ';

            if(count($fields)-1 > $i) {
                $this->query .= ', ';
            } $i++;
        }

        $this->query .= ' WHERE id = ' . $id;
    }

    /**
     * @param $ids
     * @return void
     */
    public function delete($ids) {
        $this->query .= 'DELETE FROM ' . $this->table . ' WHERE ';
        $i = 0; foreach ($ids as $id) {
            $this->query .= 'id = ' . $id . ' ';

            if(count($ids)-1 > $i) {
                $this->query .= 'OR ';
            } $i++;
        }
    }

    /**
     * Query execution sql function
     *
     * @return array
     */
    public function execute() // : string сделает обязательным возвращением функцией строки
    {
        $connection = new Connection();
        $result = $connection->query($this->query . ';');
        $lastInsertID = $connection->lastInsertID();

        return ['result' => $result, 'lastInsertID' => $lastInsertID];
    }
}