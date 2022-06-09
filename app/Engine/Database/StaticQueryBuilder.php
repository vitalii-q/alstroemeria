<?php

namespace app\Engine\Database;

use app\Engine\DIModules\Database\Connection;

final class StaticQueryBuilder
{
    /**
     * @var string $sql SQL-запрос.
     */
    private $query;

    private $table;

    /**
     * Конструктор.
     */
    public function __construct($table)
    {
        $this->table = $table;
        $this->query = '';
    }

    public function get($select = '*')
    {
        $this->query .= 'SELECT ' . $select . ' FROM ' . $this->table;
    }


    public function where($field, string $condition, $operator = '=') // , $union = false
    {
        $this->query .= ' WHERE ' . $field. $operator . '"' .$condition . '"';
    }

    /**
     * TODO: добавить массовое добавление
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

    public function delete($ids) {
        $this->query .= 'DELETE FROM ' . $this->table . ' WHERE ';
        $i = 0; foreach ($ids as $id) {
            $this->query .= 'id = ' . $id . ' ';

            if(count($ids)-1 > $i) {
                $this->query .= 'OR ';
            } $i++;
        }
    }

    public function execute() // : string сделает обязательным возвращением функцией строки
    {
        $connection = new Connection();
        $result = $connection->query($this->query . ';');
        $lastInsertID = $connection->lastInsertID();

        return ['result' => $result, 'lastInsertID' => $lastInsertID];
    }
}