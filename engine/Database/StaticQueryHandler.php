<?php

namespace engine\Database;

trait StaticQueryHandler
{
    /**
     * Sql static query handler
     *
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

        $qb = new StaticQueryBuilder(self::$table);
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

        $qb = new StaticQueryBuilder(self::$table);
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

        $qb = new StaticQueryBuilder(self::$table);
        $qb->get();
        return $qb->execute()['result'];
    }

    /**
     * @param $field
     * @param $condition
     * @param $operator
     * @return mixed
     */
    static public function where($field, $condition, $operator = '=')
    {
        /* format
        $users = User::where('id', 8, '>');*/

        $qb = new StaticQueryBuilder(self::$table);
        $qb->get();
        $qb->where($field, $condition, $operator);
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

        $qb = new StaticQueryBuilder(self::$table);
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

        $qb = new StaticQueryBuilder(self::$table);
        $qb->delete($ids);
        return $qb->execute()['result'];
    }
}