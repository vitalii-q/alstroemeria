<?php

namespace engine\Factory\Database;

use engine\Contracts\Factory\Database\IDatabaseConnect;
use engine\Contracts\Factory\Database\IDatabaseFactory;

class SQLiteDBFactory implements IDatabaseFactory
{
    private $filename;

    public $table;

    public $data;

    public function __construct($table, $data)
    {
        $this->filename = 'storage/saved/SQLite/'.$table.'.db';
        $this->table = $table;
        $this->data = $data;
    }

    public function connect() : IDatabaseConnect
    {
        return new SQLiteDBConnect($this->filename);
    }

    public function query($query)
    {
        return new SQLiteDBQuery($this->connect(), $query, $this->filename);
    }
}