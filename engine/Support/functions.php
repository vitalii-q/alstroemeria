<?php

// ПП Abstract Factory / Абстрактная фабрика
function FQueryCreate(\engine\Contracts\Factory\Database\IDatabaseFactory $factory)
{
    /* format
     * FQueryCreate(new MySQLDBFactory('product', [
        'name' => 'iPhone',
        'price' => '99000'
    ]));*/

    $query = 'INSERT INTO ' . $factory->table . '(';
    $keys = ''; $values = '';

    for ($i = 0; $i < count($factory->data); $i++) {
        $keys .= array_keys($factory->data)[$i]; // достаем ключи массива
        $values .= "'" . array_values($factory->data)[$i] . "'"; // нумеруем массив и достаем его значения
        if($i < count($factory->data)-1) {
            $keys .= ', '; $values .= ', ';
        }
    }

    $query .= $keys . ') values (' . $values . ')';

    $obj = $factory->query($query);
    $obj->execute(); // "INSERT INTO `messages` (`text`) VALUES ('text')"
}