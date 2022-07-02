<?php

namespace engine\Factory\Database;

use engine\Contracts\Factory\Database\IDatabaseConnect;

class SQLiteDBConnect implements IDatabaseConnect
{
    private $sqlite;

    public function __construct($filename)
    {
        $this->sqlite = new \SQLite3($filename);
    }

    public function connection()
    {
        return $this->sqlite;
    }
}