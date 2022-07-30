<?php

namespace engine\Factory\Database;

use engine\Contracts\Factory\Database\IDatabaseQuery;

class MySQLDBQuery implements IDatabaseQuery
{
    private $connector;

    private $query;

    public function __construct(MySQLDBConnect $connector, $query)
    {
        $this->connector = $connector;

        $this->query = $query;
    }

    public function execute()
    {
        $this->connector->connection()->query($this->query);
    }

}