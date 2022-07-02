<?php

namespace engine\Database;

trait StaticQueryBuilder
{
    /**
     * Sql static query builder
     *
     * TODO: проверка полей на уникальность (email)
     * TODO: Обернуть в try catch
     */

    /**
     * @param array $fields
     * @return mixed
     */
    static public function create(array $fields)
    {
        /* format
        User::create([
            'email' => 'test1',
            'password' => 'test2'
        ]);*/

        $qb = new StaticQueryHandler(self::$table);
        $qb->insert($fields);
        return $qb->execute()['lastInsertID']; // возвращаем ID
    }

    /**
     * @param $id
     * @param array $fields
     * @return mixed
     */
    static public function update($id, array $fields)
    {
        /* format
        $users = User::update(4, [
            'email' => 'test1',
            'password' => 'test2'
        ]);*/

        $qb = new StaticQueryHandler(self::$table);
        $qb->update($id, $fields);
        return $qb->execute()['lastInsertID']; // возвращаем ID
    }

    /**
     * @return mixed
     */
    static public function get()
    {
        /* format
        $users = User::get();*/

        $qb = new StaticQueryHandler(self::$table);
        $qb->get();
        return $qb->execute()['result'];
    }

    /**
     * @param $field
     * @param $condition
     * @param $operator
     * @return mixed
     */
    static public function where($field, $param_1, $param_2 = "=")
    {
        /* format
        $users = User::where('id', '>', 8);*/

        if(func_num_args() > 2) { // количество переданных в функцию параметров
            $operator = $param_1;
            $value    = $param_2;
        } else {
            $operator = $param_2;
            $value    = $param_1;
        }

        $qb = new StaticQueryHandler(self::$table);
        $qb->get();
        $qb->where($field, $value, $operator);
        return $qb->execute()['result'];
    }

    /**
     * @param $id
     * @return mixed
     */
    static public function find($id)
    {
        /*format
        $users = User::find(1);*/

        $qb = new StaticQueryHandler(self::$table);
        $qb->get();
        $qb->where('id', $id);
        return $qb->execute()['result'][0];
    }

    /**
     * @param $ids
     * @return mixed
     */
    static public function delete($ids)
    {
        /* format
        $users = User::delete([9, 13]);*/

        if(!is_array($ids)) { $ids = [$ids];} // если один, преобразовываем в массив

        $qb = new StaticQueryHandler(self::$table);
        $qb->delete($ids);
        return $qb->execute()['result'];
    }
}