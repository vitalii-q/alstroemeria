<?php

namespace engine\Factory\Database;

use engine\Contracts\Factory\Database\IDatabaseQuery;

class SQLiteDBQuery implements IDatabaseQuery
{
    private $connector;

    private $query;

    private $filename;

    public function __construct(SQLiteDBConnect $connector, $query, $filename)
    {
        $this->connector = $connector;

        $this->query = $query;
        $this->filename = $filename;
    }

    public function execute()
    {
        $this->connector->connection()->query("CREATE TABLE product(name, price);");
        $this->connector->connection()->query($this->query);
        chmod($this->filename, 0777); // установка прав
        var_dump($this->connector->connection()->query("SELECT * FROM product")->fetchArray());
    }
}