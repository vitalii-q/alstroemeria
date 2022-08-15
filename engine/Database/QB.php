<?php

namespace engine\Database;

use engine\DIModules\Database\Connection;

class QB // ПП Builder / Строитель
{
    /**
     * SQL Query Builder
     *
     * TODO: insert
     *
     * formats:
     *
     * $qb ->table('user')
     * ->join('department_user', 'user.id', 'department_user.user_id')
     * ->join('department', 'department.id', 'department_user.department_id')
     * ->where('department.id', 2)
     * ->orderBy('user.name', 'DESC')
     * ->limit(20)
     * ->exe();
     *
     * $qb->table('user')
     * ->where('email', $request['email'])
     * ->where('password', md5($request['password']))
     * ->update(['hash', $hash])->exe();
     */

    /**
     * @var string
     */
    protected $table;

    /**
     * @var string
     */
    protected $query;

    /**
     * @var bool
     */
    protected $select = false;
    /**
     * @var bool
     */
    protected $where = false;
    /**
     * @var bool
     */
    protected $first = false;
    /**
     * @var bool
     */
    protected $find = false;
    /**
     * @var bool
     */
    protected $update = false;

    protected $handQuery;

    /**
     * @param $table
     */
    public function __construct($table = '')
    {
        $this->table = '';
        $this->query = '';
    }

    public function query($query)
    {
        $this->query = $query;
        $this->handQuery = true;

        return $this;
    }

    /**
     * @param $fields
     * @return $this
     */
    public function select($fields = '*') {
        if(!is_array($fields)) { $fields = [$fields];} // если поле одно, преобразовываем в массив

        $this->select .= ' SELECT ';
        $i = 0; foreach ($fields as $field) {
            $this->select .= $field . ' ';

            if(count($fields)-1 > $i) {
                $this->select .= ', ';
            } $i++;
        }

        return $this;
    }

    /**
     * @param $table
     * @return $this
     */
    public function table($table) {
        $this->table = $table;

        return $this;
    }

    /**
     * @param $field
     * @param $condition
     * @param $operator
     * @return $this
     */
    public function where($field, $param_1, $param_2 = '=')
    {
        //list($value, $operator) = $this->argsFormation($param_1, $param_2);

        if(func_num_args() > 2) { // количество переданных в функцию параметров
            $operator = $param_1;
            $value    = $param_2;
        } else {
            $operator = $param_2;
            $value    = $param_1;
        }

        if($value == null or $value == '') { // если пустое значение
            $combine = ' IS NULL';
        } else {
            $combine = $operator . '"' . $value . '"';
        }

        if(!$this->where) {
            $this->query .= ' WHERE ' . $field. $combine;
            $this->where = true;
        } else {
            $this->query .= ' AND ' . $field. $combine;
        }

        return $this;
    }

    /**
     * @param $field
     * @param $condition
     * @param $operator
     * @return $this
     */
    public function orWhere($field, $param_1, $param_2 = '=') {
        //list($value, $operator) = $this->argsFormation($param_1, $param_2);

        if(func_num_args() > 2) { // количество переданных в функцию параметров
            $operator = $param_1;
            $value    = $param_2;
        } else {
            $operator = $param_2;
            $value    = $param_1;
        }

        if($value == null or $value == '') { // если пустое значение
            $combine = ' IS NULL';
        } else {
            $combine = $operator . '"' . $value . '"';
        }

        $this->query .= ' OR ' . $field . $combine;

        return $this;
    }

    /**
     * @param $field
     * @param $order
     * @return $this
     */
    public function orderBy($field, $order = 'ASC'): QB
    {
        $this->query .= ' ORDER BY ' . $field . ' ' . $order . ' ';
        return $this;
    }

    /**
     * @param $count
     * @return $this
     */
    public function limit($count)
    {
        $this->query .= ' LIMIT ' . $count . ' ';
        return $this;
    }

    /**
     * @return $this
     */
    public function first()
    {
        $this->first = true;

        return $this;
    }

    /**
     * @param $id
     * @return $this
     */
    public function find($id)
    {
        $this->query = ''; // сбрасываем запрос
        $this->query .= ' WHERE id = ' . $id;
        $this->find = true;

        return $this;
    }

    /**
     * @param $table
     * @param $first_field
     * @param $second_field
     * @param $operator
     * @return $this
     */
    public function join($table, $first_field, $second_field, $operator = '=')
    {
        $this->query .= ' JOIN ' . $table .' ON ' . $first_field . ' ' . $operator . ' ' . $second_field .' ';

        return $this;
    }

    /**
     * @param $fields
     * @return $this
     */
    public function update($fields): QB
    {
        $this->update = ' SET ';
        $i = 0; foreach ($fields as $key => $field) {
            $this->update .= $key . '="' . $field . '" ';

            if(count($fields)-1 > $i) {
                $this->update .= ', ';
            } $i++;
        }

        return $this;
    }

    /**
     * @return null
     * @throws \Exception
     */
    public function exe() // execute // : string сделает обязательным возвращением функцией строки
    {
        $query = $this->query  . ';';

        if(!$this->handQuery) { // если запрос не ручной
            if(!$this->update) { // если в запросе не указан update

                if(!$this->select) { // если в запросе не указан select
                    $query = 'SELECT * FROM ' . $this->table . $query;
                } else {
                    $query = $this->select . ' FROM ' . $this->table . $query;
                }

            } else {
                $query = 'UPDATE ' . $this->table . $this->update . $query;
            }
        }

        $connection = new Connection();
        $result = $connection->query($query);
        $lastInsertID = $connection->lastInsertID($this->table); // ID последнего созданного элемента

        if(!$result) { // если пустой результат
            return null;
        }

        if(!$this->find and !$this->first) {
            $this->queryReset();

            return $result;
        } else {
            if($this->find == true) {
                $this->queryReset();

                if (isset($result[0])) {
                    return $result[0];
                }
                throw new \Exception(sprintf('<strong>Query error ->find():</strong> %s', $query));
            }

            if($this->first) {
                $this->queryReset();

                return $result[0];
            }
        }

        if($lastInsertID) {
            $this->queryReset();

            return $lastInsertID;
        }

        /*if($lastInsertID) {
            $this->queryReset();

            return $lastInsertID;
        } else {
            if($this->find == true) {
                $this->queryReset();

                if (isset($result[0])) {
                    return $result[0];
                }
                throw new \Exception(sprintf('<strong>Query error ->find():</strong> %s', $query));
            }

            if(!$this->first) {
                $this->queryReset();

                return $result;
            } else {
                $this->queryReset();

                return $result[0];
            }
        }*/
    }

    protected static function argsFormation($param_1, $param_2)
    {
        if(func_num_args() > 2) { // количество переданных в функцию параметров
            $operator = $param_1;
            $value    = $param_2;
        } else {
            $operator = $param_2;
            $value    = $param_1;
        }

        return [$value, $operator];
    }

    /**
     * @return void
     */
    protected function queryReset()
    {
        $this->table  = '';

        $this->query  = '';

        $this->select = false;
        $this->where  = false;
        $this->first  = false;
        $this->find   = false;
    }
}

